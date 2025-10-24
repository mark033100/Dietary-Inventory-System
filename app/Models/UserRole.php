<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
