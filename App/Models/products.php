<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_desc',
        'price',
        'image',
    ];
    protected function category(){
        return $this->belongsTo(category::class, 'category_id');
    }
    public function scopeSearch($query, array $terms){
        $search = $terms['search'];
        $category = $terms['category'];
        if($search){
            $query->where(function($query) use ($search){
                return $query->where('product_name','like','%'.$search.'%')
                     ->orwhere('product_desc','like','%'.$search.'%');  
             // },function($query){
             //     return $query->where('id','>',0);
             });
        }
        $query->when($category,function($query,$category){
            return $query->whereCategoryId($category);
        });
        // if($search != ''){
        //     $query->where('product_name','like','%'.$search.'%')
        //         ->orwhere('product_desc','like','%'.$search.'%');
        // }
        return $query;
    }
    protected function order_item(){
        return $this->hasMany(OrderItem::class);
    }
}
