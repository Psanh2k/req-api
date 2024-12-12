<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Ecs\Services\Filters\Filterable;
use Modules\Ecs\Services\Sorts\Sortable;

class Transaction extends Model
{
    use HasFactory, SoftDeletes, Sortable, Filterable, HasUuids;

    protected $fillable = [
        'token',
        'order_id',
        'user_id',
        'requested_video_id',
        'amount',
        'gmo_access',
        'status',
        'cancel_description',
        'cancel_date',
    ];

    protected $casts = [
        'cancel_date' => 'datetime',
        'gmo_access'  => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requestedVideo()
    {
        return $this->belongsTo(RequestedVideo::class);
    }
}
