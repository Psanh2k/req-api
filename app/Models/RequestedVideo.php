<?php

namespace App\Models;

use App\Enums\Number;
use App\Enums\RequestedVideosType;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Ecs\Services\Filters\Filterable;
use Modules\Ecs\Services\Sorts\Sortable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class RequestedVideo extends Model
{
    use HasFactory, SoftDeletes, Filterable, Sortable;

    protected $table = "requested_videos";

    protected $fillable = [
        'user_id',
        'talent_id',
        'category_id',
        'type',
        'is_business',
        'to_relationship',
        'to_name',
        'from_name',
        'content',
        'organization_structure',
        'organization_name',
        'organization_representative',
        'contract_term',
        'scope_of_use',
        'allow_competition',
        'secondary_use',
        'offer_amount',
        'direction',
        'allow_in_sample',
        'add_to_favorites',
        'delivery_date',
        'comment',
        'status',
        'download_count',
    ];

    protected $casts = [
        'delivery_date' => 'datetime',
    ];

    protected $appends = [
        'pay_money',
        'amount',
        'format_date_request',
        'format_delivery_date',
        'status_type_text',
    ];

    public function getStatusTypeTextAttribute()
    {
        $text = '';

        if (!empty($this->type)) {
            $text = RequestedVideosType::from((int)$this->type)->requestVideoText();
        }

        return $text;
    }

    public function getFormatDateRequestAttribute()
    {
        return !empty($this->created_at) ? Carbon::parse($this->created_at)->format('Y年m月d日') : '';
    }

    public function getFormatDeliveryDateAttribute()
    {
        return !empty($this->delivery_date) ? Carbon::parse($this->delivery_date)->format('Y年m月d日') : '';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function talent()
    {
        return $this->belongsTo(User::class, 'talent_id', 'id');
    }

    public function talentInfo()
    {
        return $this->belongsTo(TalentInfo::class, 'talent_id', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getPayMoneyAttribute()
    {
        $offerAmountNumber = !is_null($this->offer_amount)
                                ? str_replace(',', '', $this->offer_amount)
                                : 0;

        return $offerAmountNumber
            ? $offerAmountNumber - ($offerAmountNumber * config('constants.pay_pee') / 100)
            : 0;
    }

    public function offerAmount() : Attribute
    {
        return Attribute::make(
            get: fn($value) =>  !is_null($value) ?
                                        number_format($value, Number::ZERO->value, '.', ',') :
                                        Number::ZERO->value,
        );
    }

    public function getAmountAttribute()
    {
        return str_replace(',', '', $this->offer_amount ?? 0);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id','requested_video_id');
    }

    public function scopeWithTalent($query)
    {
        return $query->with(['talent' => function ($query) {
            $query->talentActive();
        }]);
    }

    public function videoProcess()
    {
        return $this->hasMany(VideoProgress::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'requested_video_id');
    }

    public function video()
    {
        return $this->hasOne(Video::class, 'requested_video_id', 'id');
    }

}
