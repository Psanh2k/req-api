<?php

namespace App\Models;

use App\Enums\VideoSettingPrice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Ecs\Services\Sorts\Sortable;

class VideoSetting extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $fillable = [
        'talent_id',
        'type',
        'amount_in_ten_thousand',
        'amount_in_thousand',
        'delivery_days',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'talent_id', 'id');
    }

    public function totalPrice()
    {
        return ($this->amount_in_ten_thousand * VideoSettingPrice::UNIT_OF_TEN_THOUSAND->value) +
               ($this->amount_in_thousand * VideoSettingPrice::UNIT_OF_THOUSAND->value);
    }
}
