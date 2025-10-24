<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'sku',
        'barcode',
        'name',
        'category',
        'unit_qty',
        'unit_id',
        'description',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];
}
