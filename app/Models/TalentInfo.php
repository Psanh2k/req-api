<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Ecs\Services\FileService;

class TalentInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'phone',
        'avatar',
        'twitter',
        'facebook',
        'instagram',
        'youtube',
        'follower',
        'inquiries',
        'birthplace',
        'height',
        'weight',
        'size_1',
        'size_2',
        'size_3',
        'foot_size',
        'eye_color',
        'hobbies',
        'special_skill',
        'favorite_food',
        'background',
        'comment',
        'star',
    ];

    protected $appends = [
        'image'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function getImageAttribute() : ?string
    {
        $url = null;

        if (!is_null($this->avatar)) {
            $url = !empty(config('constants.aws.cloud_front_img'))
                ? config('constants.aws.cloud_front_img') . $this->avatar
                : FileService::url($this->avatar, config('filesystems.default'));
        }

        return $url;
    }

    public function getFollowerAttribute(): ?string
    {
        return !is_null($this->attributes['follower'])
            ? number_format($this->attributes['follower'])
            : 0;
    }

}
