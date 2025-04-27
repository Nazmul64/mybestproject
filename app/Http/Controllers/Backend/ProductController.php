<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\cr;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $product=Product::with('category','subcategory')->get();
        return view('Backend.Product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category =Category::all();
        $subcategory =SubCategory::all();
        return view('Backend.Product.create',compact('category','subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input (optional but recommended)
        $request->validate([
            'product_name' => 'required|string|max:255',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,web',
            'color_text' => 'nullable|array', // validate as an array
            'size_description' => 'nullable|array', // validate as an array
        ]);

        // Handle single main photo
        $fileName = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = date('dmyhis') . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/product'), $fileName);
        }

        // Handle multiple gallery images
        $galleryImageNames = [];
        if ($request->hasFile('gallery_image')) {
            foreach ($request->file('gallery_image') as $file) {
                $imageName = date('dmyhis') . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/product'), $imageName);
                $galleryImageNames[] = $imageName;
            }
        }

        // Save product to DB
        $product = Product::create([
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_description' => $request->product_description,
            'product_details_description' => $request->product_details_description,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'video_url' => $request->video_url,
            'stock' => $request->stock,
            'is_advertise' => $request->is_advertise ?? 0,
            'discount_percentage' => $request->discount_percentage,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'photo' => $fileName,
            'gallery_image' => json_encode($galleryImageNames),
        ]);
        $product->color_text = json_encode($request->color_text);
        $product->size_description = json_encode($request->size_description);
        $product->save();
        return back()->with('success', 'Product uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category =Category::all();
        $subcategory =SubCategory::all();
        $product =Product::find($id);
        return view('Backend.Product.edit',compact('product','category','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $fileName = $product->photo;
        if ($request->hasFile('new_photo')) {
            if (file_exists(public_path('uploads/product/' . $product->photo))) {
                unlink(public_path('uploads/product/' . $product->photo));
            }

            $file = $request->file('new_photo');
            $fileName = date('dmyhi') . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/product'), $fileName);
        }

        $galleryImageNames = json_decode($product->gallery_image ?? '[]', true);
        if ($request->hasFile('new_gallery_image')) {
            foreach ($galleryImageNames as $img) {
                $path = public_path('uploads/product/' . $img);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $galleryImageNames = [];
            foreach ($request->file('new_gallery_image') as $file) {
                $newName = date('dmyhi') . '_' . uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/product'), $newName);
                $galleryImageNames[] = $newName;
            }
        }

        $product->update([
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_description' => $request->product_description,
            'product_details_description' => $request->product_details_description,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'video_url' => $request->video_url,
            'stock' => $request->stock,
            'is_advertise' => $request->is_advertise ?? 0,
            'discount_percentage' => $request->discount_percentage,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'photo' => $fileName,
            'gallery_image' => json_encode($galleryImageNames),
        ]);

        $product->color_text = json_encode($request->color_text);
        $product->size_description = json_encode($request->size_description);
        $product->save();

        return back()->with('success', 'Product updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subcategory = Product::findOrFail($id);
        $subcategory->delete();
        return back()->with('success', 'Product Delete successfully!');
    }
}
