<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;
use App\Handlers\VehicleHandler;
use App\Models\Vehicle;
use Ramsey\Uuid\Type\Integer;

class Vehicles extends Component
{
    use WithPagination;

    public $registration_number;
    public $model;
    public $fuel_type;
    public $transmission;
    public $selectedUserId;

    public $filter_registration_number;
    public $filter_model;
    public $filter_customer;

    public function registerVehicle()
    {
        $validatedData = $this->validate([
            'registration_number' => ['required', 'string', 'max:255', 'regex:/^[A-Z]{2,4}[\-\s]?\d{2,4}$/'],
            'model' => ['required', 'string', 'max:255'],
            'fuel_type' => ['required', 'string', 'max:255'],
            'transmission' => ['required', 'in:Manual,Auto,Other'],
            'selectedUserId' => ['nullable'],
        ]);

        $vehicle = VehicleHandler::registerVehicle($validatedData);

        if ($vehicle) {
            Toaster::success("Vehicle added successfully");
        }
    }

    public function deleteVehicle($id)
    {
        $vehicle = VehicleHandler::delete($id);

        if ($vehicle) {
            Toaster::success("Vehicle deleted successfully");
        }
    }

    public function filter()
    {
        $validatedData = $this->validate([
            'filter_registration_number' => ['nullable', 'string', 'max:255'],
            'filter_model' => ['nullable', 'string', 'max:255'],
            'filter_customer' => ['nullable', 'string', 'max:255'],
        ]);

        $this->filter_registration_number = $validatedData['filter_registration_number'];
        $this->filter_model = $validatedData['filter_model'];
        $this->filter_customer = $validatedData['filter_customer'];
    }

    public function render()
    {
        $vehiclesQuery = Vehicle::query();

        if ($this->filter_registration_number) {
            $vehiclesQuery->where('registration_number', 'like', '%' . $this->filter_registration_number . '%');
        }

        if ($this->filter_model) {
            $vehiclesQuery->where('model', 'like', '%' . $this->filter_model . '%');
        }

        if ($this->filter_customer) {
            $vehiclesQuery->with('user')->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->filter_customer . '%');
            });
        }

        return view('livewire.dashboard.vehicles')->with([
            'users' => User::role('User')->get(),
            'vehicles' => $vehiclesQuery->with('user')->paginate(10),
        ]);
    }
}
