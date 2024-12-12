<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Ecs\Services\Filters\Filterable;

class UserCategory extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'talent_id',
        'category_id'
    ];
}
