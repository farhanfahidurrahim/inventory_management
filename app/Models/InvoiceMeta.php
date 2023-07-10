<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceMeta extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'category_id',
        'product_id',
        'unit_price',
        'quantity',
        'unit_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
