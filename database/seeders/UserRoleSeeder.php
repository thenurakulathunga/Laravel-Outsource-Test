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

        $role2 = Role::create(['name' => 'User']);

        $user  = User::create(
            ['name' => "Thenura Piyumal user 1", 'password' => Hash::make('Thenura@2001'), 'email' => 'thenura@thesanmark1.com' , 'nic' => '200124900981']
        );
        $user = $user->assignRole($role2);
        $user  = User::create(
            ['name' => "Thenura Piyumal user 2", 'password' => Hash::make('Thenura@2001'), 'email' => 'thenura@thesanmark2.com' , 'nic' => '200124900982']
        );
        $user = $user->assignRole($role2);
        
        $user  = User::create(
            ['name' => "Thenura Piyumal", 'password' => Hash::make('Thenura@2001'), 'email' => 'thenura@thesanmark.com' , 'nic' => '200124900980']
        );
        $user = $user->assignRole($role1);
    }
}
