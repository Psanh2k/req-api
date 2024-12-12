<?php

namespace App\Models;

use App\Enums\MaintenanceType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Ecs\Services\Sorts\Sortable;
use Illuminate\Database\Eloquent\Builder;

class Maintenance extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'status',
        'start_date',
        'end_date',
    ];

    public function scopeMaintenanceInProgress(Builder $query): void
    {
        $query->where('status', MaintenanceType::IN_PROGRESS->value);
    }
}