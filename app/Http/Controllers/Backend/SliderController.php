<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\cr;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('Backend.Slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp,web,svg|max:2048',
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sliders'), $filename);
            $slider->photo = $filename;
        }

        $slider->status = 1; // Assuming you want to set the status to 1 by default
        // You can also set other fields here if needed
        // Save the slider to the database
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider created successfully.');
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
        $sliders = Slider::find($id);
        return view('Backend.Slider.edit',compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sliders = Slider::find($id);
        if($request->hasFile('new_photo')){
            if(file_exists(public_path('uploads/sliders/'.$sliders->photo))){
                unlink(public_path('uploads/sliders/'.$sliders->photo));
            }
            $file = $request->file('new_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sliders'), $filename);
            $sliders->photo = $filename;
        }
        $sliders->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        return redirect()->route('slider.index')->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sliders = Slider::find($id);
        $sliders->delete();
        return redirect()->route('slider.index')->with('success', 'Slider delete successfully.');
    }
}
