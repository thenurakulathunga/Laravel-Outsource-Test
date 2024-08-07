<?php

use App\Livewire\Dashboard\InitiateJobs;
use App\Livewire\Dashboard\UpdateVehicle;
use App\Livewire\Dashboard\Vehicles;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\UserRegistration;

Route::view('/', 'welcome');

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::view('dashboard', 'dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('user' , UserRegistration::class)->name('dashboard.user');
    Route::get('vehicles' , Vehicles::class)->name('dashboard.vehicles');
    Route::get('vehicle/{vehicleId}' , UpdateVehicle::class)->name('dashboard.vehicle.update');
    Route::get('initiate-jobs' , InitiateJobs::class)->name('dashboard.initiate-jobs');
});


require __DIR__ . '/auth.php';
