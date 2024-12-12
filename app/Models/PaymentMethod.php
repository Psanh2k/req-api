<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "payment_methods";

    protected $fillable = [
        'user_id',
        'bank_name',
        'bank_type',
        'bank_code',
        'branch_name',
        'branch_code',
        'account',
        'account_kana',
        'account_type',
        'account_number',
    ];

    public function accountNumber() : Attribute
    {
        return Attribute::make(
            get: fn(string $value) => !is_null($value) ? decrypt_token($value) : null,
            set: fn(string $value) => !is_null($value) ? encrypt_token($value) : null,
        );
    }
}
