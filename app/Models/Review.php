<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Ecs\Services\Sorts\Sortable;

class Review extends Model
{
    use HasFactory, SoftDeletes, Sortable, SoftDeletes;

    protected $fillable = [
        'user_id',
        'talent_id',
        'requested_video_id',
        'star',
        'content'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function talent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'talent_id', 'id');
    }
    public function requestedVideo()
    {
        return $this->belongsTo(RequestedVideo::class, 'requested_video_id');
    }

}
