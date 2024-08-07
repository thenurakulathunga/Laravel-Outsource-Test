<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ServiceJobVehicle extends Model
{
    protected $table = 'service_job_vehicles';
    use HasFactory;
}
