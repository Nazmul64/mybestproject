<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\cr;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Permissionrole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissionuser = Permissionrole::getPermission('Delete User',Auth::user()->role);
        if (!empty($permissionuser)) {
            return redirect()->route('error')->with('error', 'You do not have permission to access this page.');
        }
        $role =Role::all();

        $data['permissionuserAdd'] = $permissionuserUser =Permissionrole::getPermission('Add User',Auth::user()->role);
        $data['permissionuserEdit'] = $permissionuserUser =Permissionrole::getPermission('Edit User',Auth::user()->role);
        $data['permissionuserDelete'] = $permissionuserUser =Permissionrole::getPermission('Delete User',Auth::user()->role);
        return view('Backend.Role.index',compact('role'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissionuser = Permissionrole::getPermission('Delete User',Auth::user()->role);
        if (!empty($permissionuser)) {
            return redirect()->route('error')->with('error', 'You do not have permission to access this page.');
        }
        $getRecord = Permission::getRecord();
        $data['getRecord'] =$getRecord;
        return view('Backend.Role.create',$data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permissionuser = Permissionrole::getPermission('Delete User',Auth::user()->role);
        if (!empty($permissionuser)) {
            return redirect()->route('error')->with('error', 'You do not have permission to access this page.');
        }
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

            Permissionrole::InsertUpdateRecord($request->permissions_id, $role->id);

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
        $permissionuser = Permissionrole::getPermission('Delete User',Auth::user()->role);
        if (!empty($permissionuser)) {
            return redirect()->route('error')->with('error', 'You do not have permission to access this page.');
        }

        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('role.index')->with('error', 'Role not found!');
        }

        $getRecord = Permission::getRecord();
        $getRolePermission = Permissionrole::getRolePermission($id);

        return view('Backend.Role.edit', compact('role', 'getRecord', 'getRolePermission'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $permissionuser = Permissionrole::getPermission('Delete User',Auth::user()->role);
        if (!empty($permissionuser)) {
            return redirect()->route('error')->with('error', 'You do not have permission to access this page.');
        }
        $role = Role::findOrFail($id);

        // Validate permission_id if it's passed as an array
        $request->validate([
            'permission_id' => 'nullable|array', // If permissions are optional
            'permission_id.*' => 'exists:permissions,id', // Ensures the permissions exist in the database
            'name' => 'required|string|max:255|unique:roles,name,' . $id . '|regex:/^[a-zA-Z0-9\s]+$/',
        ], [
            'permission_id.array' => 'Permissions must be an array.',
            'permission_id.*.exists' => 'One or more permissions are invalid.',
            'name.required' => 'The field must not be empty.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name must not exceed 255 characters.',
            'name.unique' => 'This role name already exists.',
            'name.regex' => 'The role name can only contain letters, numbers, and spaces.',
        ]);

        // Update permissions for the role
        try {
            Permissionrole::InsertUpdateRecord($request->permission_id, $role->id);

            // Update the role name
            $role->update([
                'name' => ucfirst(strip_tags(trim($request->name))),
            ]);

            return back()->with('success', 'Role updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong! Please try again.' . $e->getMessage());
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $permissionuser = Permissionrole::getPermission('Delete User',Auth::user()->role);
        if (!empty($permissionuser)) {
            return redirect()->route('error')->with('error', 'You do not have permission to access this page.');
        }
        $role = Role::findOrFail($id);
        $role->delete();
        return back()->with('success', 'Role delete successfully!');
    }
}
