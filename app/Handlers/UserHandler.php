<?php

namespace App\Handlers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserHandler
{
    public static function registerUser($data = array())
    {
		$user = new User;
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->phone = $data['phone'];
		$user->address = $data['address'];
		$user->nic = $data['nic'];

		$password = Str::password(16, true, true, false, false);
		
		$user->password = Hash::make($password);

		$user->save();

		$user->assignRole('User');
		return $user;
    }
    // public static function userFilter($data = array())
    // {
	// 	$users = User::when($data['filter_email'], function ($query) use($data) {
    //         $query->where('email', 'like', '%' . $data['filter_email'] . '%');
    //     })->paginate(10);

	// 	return $users;
    // }
}