<?php

namespace Database\Seeders;
use App\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstorCreate(['id' => 1], [
            'name' =>'Admin',
            'Description' => 'Administrative Role',
        ]);

        Role::firstorCreate(['id' => 2], [
            'name' => 'Manager',
            'description' => 'Management Role',
        ]);

        Role::firstorCreate(['id' => 3], [
            'name' => 'Reception',
            'description' => 'Receptionist Role'
        ]);
        Role::firstorCreate(['id' => 4], [
            'name' => 'Employee',
            'description' => 'Just Employed',
        ]);
    }
}
