<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $permissions = [
        'Show all Doctors',
        'Add Doctor',
        'Update Doctor',
        'Delete Doctor',

        'Show all Hospitals',
        'Add Hospital',
        'Update Hospital',
        'Delete Hospital',

        'Show all Operations',
        'Add Operation',
        'Update Operation',
        'Delete Operation',

        'Show all Roles',
        'Add Roles',
        'Update Roles',
        'Delete Roles',

        'Show all Offers',
        'Add Offer',
        'Update Offer',
        'Delete Offer',

        'Show all Countries',
        'Add Country',
        'Update Country',
        'Delete Country',

        'Show all Cities',
        'Add City',
        'Update City',
        'Delete City',

        'Show all Users',
        'Add User',
        'Update User',
        'Delete User',

        'Show all Contents',
        'Add Content',
        'Update Content',
        'Delete Content',

        'Show all Specializations',
        'Add Specialization',
        'Update Specialization',
        'Delete Specialization',

        'Show all Payments',
        'Update Payment',
        'Delete Payment',

        'Show all Settings',
        'Update Settings',
    ];
    public function run(): void
    {
        foreach ($this->permissions as $key => $value) {
            Permission::create([
                'name' => $value,
                'guard_name' => 'web'
            ]);
        }
    }
}
