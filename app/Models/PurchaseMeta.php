<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseMeta extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_id',
        'category_id',
        'product_id',
        'unit_price',
        'quantity',
        'unit_id',
    ];
}
