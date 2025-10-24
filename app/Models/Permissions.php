<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use App\Policies\PermissionsPolicy;


#[UsePolicy(PermissionsPolicy::class)]
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
