<?php

namespace App\Models;

use App\Models\ServiceJob;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceSection extends Model
{
    use HasFactory;
    public function serviceJobs(): BelongsTo
    {
        return $this->belongsTo(ServiceJob::class);
    }
}
