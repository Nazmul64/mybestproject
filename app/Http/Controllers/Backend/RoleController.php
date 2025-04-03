<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\cr;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role =Role::all();

        return view('Backend.Role.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getRecord = Permission::getRecord();
        $data['getRecord'] =$getRecord;
        return view('Backend.Role.create',$data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name|regex:/^[a-zA-Z0-9\s]+$/',
        ], [
            'name.required' => 'The field must not be empty.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name must not exceed 255 characters.',
            'name.unique' => 'This role name already exists.',
            'name.regex' => 'The role name can only contain letters, numbers, and spaces.',
        ]);

        try {
            $role = new Role();
            $role->name = ucfirst(strip_tags(trim($request->name)));
            $role->save();

            return back()->with('success', 'Role added successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong! Please try again.');
        }
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
        $role =Role::find($id);
        return view('Backend.Role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id . '|regex:/^[a-zA-Z0-9\s]+$/',
        ], [
            'name.required' => 'The field must not be empty.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name must not exceed 255 characters.',
            'name.unique' => 'This role name already exists.',
            'name.regex' => 'The role name can only contain letters, numbers, and spaces.',
        ]);

        try {
            $role->update([
                'name' => ucfirst(strip_tags(trim($request->name))),
            ]);

            return back()->with('success', 'Role updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return back()->with('success', 'Role delete successfully!');
    }
}
