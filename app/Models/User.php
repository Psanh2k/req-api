<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\UserStatus;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'app_id',
        'role',
        'subscription',
        'username',
        'status',
        'setup_flag',
        'app_id',
        'failed_logins',
        'login_lock_expiration',
        'agency_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'failed_logins' => 'array',
        'login_lock_expiration' => 'datetime',
    ];

    public function scopeTalentActive(Builder $query): void
    {
        $query->where('role', UserRole::TALENT->value)
            ->where('status', UserStatus::ACTIVE->value)
            ->where('setup_flag', UserStatus::ACTIVE->value);
    }

    public function scopeManagerActive(Builder $query): void
    {
        $query->where('role', UserRole::MANAGER->value)
            ->where('status', UserStatus::ACTIVE->value)
            ->where('setup_flag', UserStatus::ACTIVE->value);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'user_categories', 'talent_id', 'category_id');
    }

    public function talentInfo()
    {
        return $this->belongsTo(TalentInfo::class, 'id', 'user_id');
    }

    public function videoSetting(): HasOne
    {
        return $this->hasOne(VideoSetting::class, 'talent_id', 'id');
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'talent_id')->withTimestamps();
    }

    public function requestVideos()
    {
        return $this->hasMany(RequestedVideo::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reviewsOfTalent()
    {
        return $this->belongsToMany(User::class, 'reviews', 'talent_id', 'user_id');
    }

    public function videoProgress()
    {
        return $this->hasMany(VideoProgress::class);
    }

    public function card()
    {
        return $this->hasOne(MemberCards::class);
    }

    public function talentBelongs()
    {
        return $this->hasMany(User::class, 'agency_id', 'id');
    }

    public function favoritesUser()
    {
        return $this->belongsToMany(Favorite::class, 'favorites', 'talent_id', 'user_id');
    }

    public function favoriteTalents()
    {
        return $this->belongsToMany(User::class, 'favorites', 'talent_id', 'user_id')->withTimestamps();
    }

    public function talentInfos()
    {
        return $this->hasOne(TalentInfo::class, 'user_id', 'id');
    }

    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class, 'user_id', 'id');
    }

    public function talentManagerInfo()
    {
        return $this->hasOne(TalentManagerInfo::class, 'user_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'talent_id', 'id');
    }

    public function videoSettings()
    {
        return $this->hasMany(VideoSetting::class, 'talent_id', 'id');
    }

    public function talentReview()
    {
        return $this->hasMany(Review::class, 'talent_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(User::class, 'agency_id', 'id');
    }

    public function requestVideosTalent()
    {
        return $this->hasMany(RequestedVideo::class, 'talent_id', 'id');
    }

    public function transactionOfTalent()
    {
        return $this->hasManyThrough(Transaction::class, RequestedVideo::class, 'talent_id', 'requested_video_id', 'id', 'id');
    }
}
