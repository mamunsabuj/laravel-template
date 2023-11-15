<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'batch',
        'price',
        'quantity',
        'note'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

   
}
