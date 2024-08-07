<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;
use App\Models\ServiceJob;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class InitiateJobs extends Component
{
    use WithPagination;
    public $selectedJobs = [];
    public $vehicleId;
    public $filter_nic = '';
    public $filter_email = '';
    public $customer = '';

    public function render()
    {
        $query = User::query();

        if (!empty($this->filter_nic)) {
            $query->where('nic', 'like', '%' . $this->filter_nic . '%');
        }

        if (!empty($this->filter_email)) {
            $query->where('email', 'like', '%' . $this->filter_email . '%');
        }

        if (!empty($this->customer)) {
            $query->where('name', 'like', '%' . $this->customer . '%');
        }

        $users = $query->role('User')->with('vehicles')->paginate(3);

        return view('livewire.dashboard.initiate-jobs', ['users' => $users, "jobs" => ServiceJob::all()]);
    }

    public function saveJobs()
    {
        $vehicle = Vehicle::find($this->vehicleId);

        if ($vehicle) {
            $vehicle->serviceJobs()->sync($this->selectedJobs);
        }

        Toaster::success('Jobs saved successfully')
    }
    public function submit()
    {
        $this->resetPage();
    }
}
