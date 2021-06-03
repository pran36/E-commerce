<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_desc',
    ];
    protected function products(){
        return $this->hasMany(products::class);
    }
    public function children(){
        return $this->hasMany('App\Models\category','parent_id');
    }
}
