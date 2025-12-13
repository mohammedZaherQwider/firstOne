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
