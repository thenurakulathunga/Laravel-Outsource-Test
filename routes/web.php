<?php

use App\Livewire\Dashboard\UserRegistration;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::view('dashboard', 'dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('user-registration' , UserRegistration::class)->name('dashboard.user-registration');
});


require __DIR__ . '/auth.php';
