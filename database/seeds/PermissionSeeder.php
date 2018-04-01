<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $permission = [
            [
                'name' => 'brand-create',
                'display_name' => 'Create Brand',
                'description' => 'Create New Brand'
            ],
            [
                'name' => 'brand-list',
                'display_name' => 'Display Brand Listing',
                'description' => 'List All Brand'
            ],
            [
                'name' => 'brand-update',
                'display_name' => 'Update Brand',
                'description' => 'Update Brand Information'
            ],
            [
                'name' => 'brand-delete',
                'display_name' => 'Delete Brand',
                'description' => 'Delete Brand'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create role',
                'description' => 'Create New role'
            ],
            [
                'name' => 'role-list',
                'display_name' => 'Display role Listing',
                'description' => 'List All role'
            ],
            [
                'name' => 'role-update',
                'display_name' => 'Update role',
                'description' => 'Update role Information'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete role',
                'description' => 'Delete role'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create User',
                'description' => 'Create New User'
            ],
            [
                'name' => 'user-list',
                'display_name' => 'Display User Listing',
                'description' => 'List All Users'
            ],
            [
                'name' => 'user-update',
                'display_name' => 'Update User',
                'description' => 'Update User Information'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete User',
                'description' => 'Delete User'
            ],
            [
                'name' => 'location-create',
                'display_name' => 'Create location',
                'description' => 'Create New location'
            ],
            [
                'name' => 'location-list',
                'display_name' => 'Display location Listing',
                'description' => 'List All locations'
            ],
            [
                'name' => 'location-update',
                'display_name' => 'Update location',
                'description' => 'Update location Information'
            ],
            [
                'name' => 'location-delete',
                'display_name' => 'Delete location',
                'description' => 'Delete location Information'
            ],
            [
                'name' => 'source-create',
                'display_name' => 'Create source',
                'description' => 'Create New source'
            ],
            [
                'name' => 'source-list',
                'display_name' => 'Display source Listing',
                'description' => 'List All source'
            ],
            [
                'name' => 'source-update',
                'display_name' => 'Update source',
                'description' => 'Update source Information'
            ],
            [
                'name' => 'source-delete',
                'display_name' => 'Delete source',
                'description' => 'Delete source Information'
            ],
            [
                'name' => 'item-create',
                'display_name' => 'Create item',
                'description' => 'Create New item'
            ],
            [
                'name' => 'item-list',
                'display_name' => 'Display item Listing',
                'description' => 'List All item'
            ],
            [
                'name' => 'item-update',
                'display_name' => 'Update item',
                'description' => 'Update item Information'
            ],
            [
                'name' => 'item-delete',
                'display_name' => 'Delete item',
                'description' => 'Delete item Information'
            ]
        ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}