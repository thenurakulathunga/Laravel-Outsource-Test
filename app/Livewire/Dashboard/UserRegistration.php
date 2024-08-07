<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Handlers\UserHandler;
use Masmerise\Toaster\Toaster;

class UserRegistration extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $phone;
    public $address;
    public $nic;
    public $filter_email;

    public function filter()
    {
        $validatedData = $this->validate([
            'filter_email' => ['nullable', 'string', 'email', 'max:255'],
        ]);

        // Store the filtered email in a component property
        $this->filter_email = $validatedData['filter_email'];
    }

    public function register()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'nic' => ['required', 'string', 'max:20', 'unique:users,nic'],
        ]);

        $userRegister = UserHandler::registerUser($validatedData);

        if ($userRegister) {
            $this->reset(['name', 'email', 'phone', 'address', 'nic']);
            Toaster::success('User registration successful');
        }
    }

    public function render()
    {
        $query = User::query();

        if ($this->filter_email) {
            $query->where('email', 'like', "%{$this->filter_email}%");
        }

        $users = $query->role('User')->paginate(10);

        return view('livewire.dashboard.user-registration', ['users' => $users]);
    }
}
