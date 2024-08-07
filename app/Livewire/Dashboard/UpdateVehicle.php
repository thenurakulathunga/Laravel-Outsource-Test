<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use App\Handlers\VehicleHandler;

class UpdateVehicle extends Component
{
    public $vehicleId;
    public $registration_number;
    public $model;
    public $fuel_type;
    public $transmission;
    public $selectedUserId;
    public $selectedUser;
    public $users;


    public function mount($vehicleId)
    {
        $vehicle = Vehicle::with('user')->findOrFail($vehicleId);
        $this->selectedUser = $vehicle->user->name;
        $this->vehicleId = $vehicle->id;
        $this->registration_number = $vehicle->registration_number;
        $this->model = $vehicle->model;
        $this->fuel_type = $vehicle->fuel_type;
        $this->transmission = $vehicle->transmission;
        $this->selectedUserId = $vehicle->user_id;
        $this->users = User::all();
    }

    public function updateVehicle()
    {
        $validatedData = $this->validate([
            'registration_number' => ['required', 'string', 'max:255', 'regex:/^[A-Z]{2,4}[\-\s]?\d{2,4}$/'],
            'model' => ['required', 'string', 'max:255'],
            'fuel_type' => ['required', 'string', 'max:255'],
            'transmission' => ['required', 'in:Manual,Auto,Other'],
            'selectedUserId' => ['nullable'],
        ]);

        $vehicle = VehicleHandler::update($validatedData, $this->vehicleId);

        if ($vehicle) {
            Toaster::success("Vehicle Updated");
        }
    }


    public function render()
    {
        return view('livewire.dashboard.update-vehicle');
    }
}
