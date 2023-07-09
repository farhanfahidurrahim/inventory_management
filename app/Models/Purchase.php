<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_no',
        'supplier_id',
        'total_amount',
        'paid_amount',
        'due_amount',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchasemeta()
    {
        return $this->hasMany(PurchaseMeta::class);
    }
}
