<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = "favorites";

    protected $fillable
        = [
            'user_id',
            'talent_id',
            'created_at',
            'updated_at'
        ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function setCreatedAtAttribute()
    {
        return $this->created_at = now();
    }

    public function setUpdatedAtAttribute()
    {
        return $this->updated_at = now();
    }
}
