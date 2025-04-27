<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\cr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('backend.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'category_name' => 'required',
        'category_slug' => 'required',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $category = new Category();
    $category->category_name = $request->category_name;

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/category'), $filename);
        $category->photo = $filename;
    }

    $category->status = $request->status ? 1 : 0;

    // Clean and format slug
    $slug = strtolower($request->category_slug);
    $slug = preg_replace('/[^A-Za-z0-9\- ]/', '', $slug);
    $slug = str_replace(' ', '-', $slug);
    $slug = preg_replace('/-+/', '-', $slug);
    $slug = trim($slug, '-');
    $category->category_slug = $slug;

    $category->save();

    return redirect()->route('category.index')->with('success', 'Category created successfully.');
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
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required',
            'new_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1',
        ]);

        $category = Category::findOrFail($id);

        // Handle photo upload
        if ($request->hasFile('new_photo')) {
            // Delete old photo if exists
            $oldPath = public_path('uploads/category/' . $category->photo);
            if (file_exists($oldPath) && is_file($oldPath)) {
                unlink($oldPath);
            }

            $file = $request->file('new_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/category'), $filename);
        }

        // Clean slug
        $slug = strtolower($request->category_slug);
        $slug = preg_replace('/[^A-Za-z0-9\- ]/', '', $slug);
        $slug = str_replace(' ', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = trim($slug, '-');

        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => $slug,
            'photo' => $filename ?? $category->photo,
            'status' => $request->status,
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
