<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TalentManagerInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "talent_manager_infos";

    protected $fillable = [
        'user_id',
        'manager_name',
        'phone',
        'zipcode',
        'address',
        'inquiries',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
