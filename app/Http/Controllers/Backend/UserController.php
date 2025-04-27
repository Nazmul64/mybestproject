<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $data['getRecord'] =User::getRecord();
        return view('Backend.User.index',$data);
    }

    // Show the form to create a new user
    public function create()
    {
       $data['getRecord'] =Role::getRecord();
        return view('Backend.User.create',$data);
    }

    // Store the newly created user in storage
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name|regex:/^[a-zA-Z0-9\s]+$/',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20|confirmed',
        ], [
            'name.required' => 'The name field must not be empty.',
            'name.unique' => 'This username already exists.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'The password field is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'role.required' => 'The role field is required.',
            'role.unique' => 'This role is already registered.',
        ]);

        try {
            // Create a new user
            User::create([
                'name' => ucfirst(trim($request->name)),
                'email' => strtolower(trim($request->email)),
                'password' => Hash::make($request->password),
                'role' => strtolower(trim($request->role)),
            ]);

            // Redirect to user index with success message
            return redirect()->route('user.index')->with('success', 'User added successfully!');
        } catch (\Exception $e) {
            // Catch any errors and return with the error message
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Show the form to edit a user
    public function edit($id)
    {
        $data['getRecord'] = User::getsingle($id);  // Fetch the user using custom method
        $data['getRole'] = Role::getRecord();  // Fetch all roles for the select dropdown

        $user = $data['getRecord'];  // User data

        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User not found!');
        }

        return view('Backend.User.edit', $data);
    }



    // Update the specified user in storage
    public function update(Request $request, $id)
    {
        // Find the user
        $user = User::findOrFail($id);

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $id . '|regex:/^[a-zA-Z0-9\s]+$/',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|max:20|confirmed',
        ], [
            'name.required' => 'The name field must not be empty.',
            'name.unique' => 'This username already exists.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email is already registered.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        try {
            // Prepare update data
            $updateData = [
                'name' => ucfirst(trim($request->name)),
                'email' => strtolower(trim($request->email)),
                'role' => strtolower(trim($request->role)),
            ];

            // If password is provided, hash and update it
            if (!empty($request->password)) {
                $updateData['password'] = Hash::make($request->password);
            }

            // Update user
            $user->update($updateData);

            // Redirect to user index with success message
            return redirect()->route('user.index')->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            // Catch any errors and return with the error message
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Delete the specified user from storage
    public function destroy($id)
    {
        try {
            // Find and delete user
            $user = User::findOrFail($id);
            $user->delete();

            // Redirect back with success message
            return back()->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            // Catch any errors and return with the error message
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
