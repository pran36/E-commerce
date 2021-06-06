<?php

namespace App\Models;

use App\Models\products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected function product(){
        return $this->belongsTo(products::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
