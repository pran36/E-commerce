<?php

use App\Models\category;
use Intervention\Image\Facades\Image;

use function PHPUnit\Framework\fileExists;

if(!function_exists('image_crop')){
        function image_crop($image_name,$width,$height){
            if(
                fileExists(storage_path('app/public/images/'.$image_name)) &&
                fileExists(storage_path('app/public/images/thumbnail/'.$image_name)==false)
             ){
                $image_resize=Image::make(storage_path('app/public/images/'.$image_name));
                $image_resize->resize($width,$height);
                $image_resize->save(storage_path('app/public/images/thumbnail/'.$image_name));
            }
            // return asset('app/public/images/thumbnail/'.$image_name);
        }
        function cover_crop($image_name,$width,$height){
            if(
                fileExists(storage_path('app/public/images/'.$image_name)) &&
                fileExists(storage_path('app/public/images/cover/'.$image_name)==false)
             ){
                $image_resize=Image::make(storage_path('app/public/images/'.$image_name));
                $image_resize->resize($width,$height);
                $image_resize->save(storage_path('app/public/images/cover/'.$image_name));
            }
            // return asset('app/public/images/thumbnail/'.$image_name);
        }
        function medium_crop($image_name,$width,$height){
            if(
                fileExists(storage_path('app/public/images/'.$image_name)) &&
                fileExists(storage_path('app/public/images/medium/'.$image_name)==false)
             ){
                $image_resize=Image::make(storage_path('app/public/images/'.$image_name));
                $image_resize->resize($width,$height);
                $image_resize->save(storage_path('app/public/images/medium/'.$image_name));
            }
            // return asset('app/public/images/thumbnail/'.$image_name);
        }
    }
if(!function_exists('categories_list')){
    function categories_list(){
        return category::whereParentId(0)->get();
    }
}
?>