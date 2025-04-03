<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // User Permissions
            ['name' => 'Add User', 'slug' => 'add-user', 'groupby' => 'User'],
            ['name' => 'Edit User', 'slug' => 'edit-user', 'groupby' => 'User'],
            ['name' => 'Delete User', 'slug' => 'delete-user', 'groupby' => 'User'],

            // Role Permissions
            ['name' => 'Add Role', 'slug' => 'add-role', 'groupby' => 'Role'],
            ['name' => 'Edit Role', 'slug' => 'edit-role', 'groupby' => 'Role'],
            ['name' => 'Delete Role', 'slug' => 'delete-role', 'groupby' => 'Role'],

            // Category Permissions
            ['name' => 'Add Category', 'slug' => 'add-category', 'groupby' => 'Category'],
            ['name' => 'Edit Category', 'slug' => 'edit-category', 'groupby' => 'Category'],
            ['name' => 'Delete Category', 'slug' => 'delete-category', 'groupby' => 'Category'],

            // Sub Category Permissions
            ['name' => 'Add Sub Category', 'slug' => 'add-sub-category', 'groupby' => 'Sub Category'],
            ['name' => 'Edit Sub Category', 'slug' => 'edit-sub-category', 'groupby' => 'Sub Category'],
            ['name' => 'Delete Sub Category', 'slug' => 'delete-sub-category', 'groupby' => 'Sub Category'],

            // Product Permissions
            ['name' => 'Add Product', 'slug' => 'add-product', 'groupby' => 'Product'],
            ['name' => 'Edit Product', 'slug' => 'edit-product', 'groupby' => 'Product'],
            ['name' => 'Delete Product', 'slug' => 'delete-product', 'groupby' => 'Product'],
            // Product Slider
            ['name' => 'Add Slider', 'slug' => 'add-Slider', 'groupby' => 'Slider'],
            ['name' => 'Edit Slider', 'slug' => 'edit-Slider', 'groupby' => 'Slider'],
            ['name' => 'Delete Slider', 'slug' => 'delete-Slider', 'groupby' => 'Slider'],
            // Product Order
            ['name' => 'Add Order', 'slug' => 'add-Order', 'groupby' => 'Order'],
            ['name' => 'Edit Order', 'slug' => 'edit-Order', 'groupby' => 'Order'],
            ['name' => 'Delete Order', 'slug' => 'delete-Order', 'groupby' => 'Order'],
            // Product Order
            ['name' => 'Add Setting', 'slug' => 'add-Setting', 'groupby' => 'Setting'],
            ['name' => 'Edit Setting', 'slug' => 'edit-Setting', 'groupby' => 'Setting'],
            ['name' => 'Delete Setting', 'slug' => 'delete-Setting', 'groupby' => 'Setting'],


            // Product Order
            ['name' => 'Add Shipping ', 'slug' => 'add-Shipping', 'groupby' => 'Shipping'],
            ['name' => 'Edit Shipping', 'slug' => 'edit-Shipping', 'groupby' => 'Shipping'],
            ['name' => 'Delete Shipping', 'slug' => 'delete-Shipping', 'groupby' => 'Shipping'],
            // Product Createorder
            ['name' => 'Add Create_order ', 'slug' => 'add-Create_order', 'groupby' => 'Createorder'],
            ['name' => 'Edit Create_order', 'slug' => 'edit-Create_order', 'groupby' => 'Createorder'],
            ['name' => 'Delete Create_order', 'slug' => 'delete-Create_order', 'groupby' => 'Createorder'],
            // Product privacyadded
            ['name' => 'Add privacy ', 'slug' => 'add-privacy_added', 'groupby' => 'privacy'],
            ['name' => 'Edit privacy', 'slug' => 'edit-privacy_added', 'groupby' => 'privacy'],
            ['name' => 'Delete privacy', 'slug' => 'delete-privacy_added', 'groupby' => 'privacy'],
            // Product About
            ['name' => 'Add About ', 'slug' => 'add-About', 'groupby' => 'About'],
            ['name' => 'Edit About', 'slug' => 'edit-About', 'groupby' => 'About'],
            ['name' => 'Delete About', 'slug' => 'delete-About', 'groupby' => 'About'],
            // Product Contact
            ['name' => 'Add Contact ', 'slug' => 'add-Contact', 'groupby' => 'Contact'],
            ['name' => 'Edit Contact', 'slug' => 'edit-Contact', 'groupby' => 'Contact'],
            ['name' => 'Delete Contact', 'slug' => 'delete-Contact', 'groupby' => 'Contact'],

        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['slug' => $permission['slug']], $permission);
        }
    }
}
