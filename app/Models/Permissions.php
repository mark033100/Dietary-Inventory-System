<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_permissions');
    }
}
