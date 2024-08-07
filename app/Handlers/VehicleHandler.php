<?php

namespace App\Handlers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class VehicleHandler
{
	public static function update($data = array(), $vehicleId)
	{
		$vehicle = Vehicle::findOrFail($vehicleId);
		$vehicle->registration_number = $data['registration_number'];
		$vehicle->model = $data['model'];
		$vehicle->fuel_type = $data['fuel_type'];
		$vehicle->user_id = $data['selectedUserId'];
		$vehicle->transmission = $data['transmission'];
		$vehicle->save();

		return $vehicle;
	}
	public static function registerVehicle($data = array())
	{
		$vehicle = new Vehicle;
		$vehicle->registration_number = $data['registration_number'];
		$vehicle->model = $data['model'];
		$vehicle->fuel_type = $data['fuel_type'];
		$vehicle->user_id = $data['selectedUserId'];
		$vehicle->transmission = $data['transmission'];
		$vehicle->save();

		return $vehicle;
	}
	public static function delete($data)
	{

		$vehicle = Vehicle::findOrFail($data);

		if ($vehicle) {
			$vehicle->delete();
		}

		return $vehicle;
	}
	public static function findVehicle($data)
	{

		$vehicle = Vehicle::with('user', 'serviceJobs')->findOrFail($data);

		return $vehicle;
	}
}
