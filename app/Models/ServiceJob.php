<?php

namespace App\Models;

use App\Models\Vehicle;
use App\Models\ServiceSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ServiceJob extends Model
{
    use HasFactory;

    public function serviceSection(): BelongsTo
    {
        return $this->belongsTo(ServiceSection::class);
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
