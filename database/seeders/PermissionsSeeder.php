<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionGroups = [
            'Dashboard' => [
                ['name' => 'Dashboard'],
            ],
            'User' => [
                ['name' => 'Add User'],
                ['name' => 'Edit User'],
                ['name' => 'Delete User'],
            ],
            'Role' => [
                ['name' => 'Add Role'],
                ['name' => 'Edit Role'],
                ['name' => 'Delete Role'],
            ],
            'Category' => [
                ['name' => 'Add Category'],
                ['name' => 'Edit Category'],
                ['name' => 'Delete Category'],
            ],
            'SubCategory' => [
                ['name' => 'Add Sub Category'],
                ['name' => 'Edit Sub Category'],
                ['name' => 'Delete Sub Category'],
            ],
            'Product' => [
                ['name' => 'Add Product'],
                ['name' => 'Edit Product'],
                ['name' => 'Delete Product'],
            ],
            'Slider' => [
                ['name' => 'Add Slider'],
                ['name' => 'Edit Slider'],
                ['name' => 'Delete Slider'],
            ],
            'Order' => [
                ['name' => 'Add Order'],
                ['name' => 'Edit Order'],
                ['name' => 'Delete Order'],
            ],
            'Setting' => [
                ['name' => 'Add Setting'],
                ['name' => 'Edit Setting'],
                ['name' => 'Delete Setting'],
            ],
            'Shipping' => [
                ['name' => 'Add Shipping'],
                ['name' => 'Edit Shipping'],
                ['name' => 'Delete Shipping'],
            ],
            'CreateOrder' => [
                ['name' => 'Add Create Order'],
                ['name' => 'Edit Create Order'],
                ['name' => 'Delete Create Order'],
            ],
            'Privacy' => [
                ['name' => 'Add Privacy'],
                ['name' => 'Edit Privacy'],
                ['name' => 'Delete Privacy'],
            ],
            'About' => [
                ['name' => 'Add About'],
                ['name' => 'Edit About'],
                ['name' => 'Delete About'],
            ],
            'Contact' => [
                ['name' => 'Add Contact'],
                ['name' => 'Edit Contact'],
                ['name' => 'Delete Contact'],
            ],
        ];

        foreach ($permissionGroups as $group => $permissions) {
            foreach ($permissions as $permission) {
                $name = $permission['name'];
                $slug = Str::slug($name, '-');

                Permission::updateOrCreate(
                    ['slug' => $slug],
                    [
                        'name' => $name,
                        'slug' => $slug,
                        'groupby' => $group
                    ]
                );
            }
        }
    }
}
