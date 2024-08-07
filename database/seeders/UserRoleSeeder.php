<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);

        $user  = User::create(
            ['name' => "Thenura Piyumal", 'password' => Hash::make('Thenura@2001'), 'email' => 'thenura@thesanmark.com']
        );
        $user = $user->assignRole($role1);
    }
}
