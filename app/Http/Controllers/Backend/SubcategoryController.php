<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\cr;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')->get();
        return view('backend.Subcategory.index', compact('subcategories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.Subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|string|max:255|unique:sub_categories,subcategory_name',
            'category_id'      => 'required|exists:categories,id',
            'status'           => 'required|in:0,1',
            'sub_photo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $subcategory = new SubCategory();
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::slug($request->subcategory_name);
        $subcategory->category_id = $request->category_id;
        $subcategory->status = $request->status;

        if ($request->hasFile('sub_photo')) {
            $file = $request->file('sub_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/subcategory'), $filename);
            $subcategory->sub_photo = $filename;
        }

        $subcategory->save();

        return redirect()->route('subcategory.index')->with('success', 'Subcategory added successfully.');
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
        $categories = Category::all();
        $subCategory = SubCategory::find($id);
        return view('backend.Subcategory.edit',compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory_name' => 'required|string|max:255|unique:sub_categories,subcategory_name',
            'category_id'      => 'required|exists:categories,id',
            'status'           => 'required|in:0,1',
            'sub_photo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $subCategory = SubCategory::findOrFail($id);

        // Generate unique slug
        $baseSlug = Str::slug($request->subcategory_name);
        $slug = $baseSlug;
        $count = 1;

        while (SubCategory::where('subcategory_slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        // Update fields
        $subCategory->subcategory_name = $request->subcategory_name;
        $subCategory->subcategory_slug = $slug;
        $subCategory->category_id = $request->category_id;
        $subCategory->status = $request->status;

        // Photo update
        if ($request->hasFile('new_sub_photo')) {
            $oldPath = public_path('uploads/subcategory/' . $subCategory->sub_photo);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $file = $request->file('new_sub_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/subcategory'), $filename);
            $subCategory->sub_photo = $filename;
        }

        $subCategory->save();

        return redirect()->route('subcategory.index')->with('success', 'Subcategory updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        return redirect()->route('subcategory.index')->with('success', 'Subcategory deleted successfully.');
    }
}
