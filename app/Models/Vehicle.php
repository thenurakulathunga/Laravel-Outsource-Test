<?php

namespace App\Models;

use App\Models\User;
use App\Models\ServiceJob;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'registration_number',
        'model',
        'fuel_type',
        'user_id',
        'transmission',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function serviceJobs(): BelongsToMany
    {
        return $this->belongsToMany(ServiceJob::class);
    }
}
