<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_reviews extends Model
{
    use HasFactory;
    public function products(){
        return $this->belongsTo(products::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
