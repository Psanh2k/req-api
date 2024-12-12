<?php

namespace App\Models;

use App\Enums\MailType;
use App\Enums\SetupFlag;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCodes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'type',
        'code',
        'expiration_time',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'expiration_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function checkCodeSetting($token)
    {
        return  VerificationCodes::where([
                                'code' => decrypt_token($token),
                                'type' => MailType::VERIFY_ACCOUNT->value,
                            ])->with(['user', 'user.talentInfo'])
                            ->whereHas('user', function ($query) {
                                return $query->where('role', UserRole::TALENT->value)
                                            ->where('setup_flag', SetupFlag::NOT_SETUP->value);
                            })
                            ->first();
    }
}
