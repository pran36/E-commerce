<?php
use Intervention\Image\Facades\Image;

use function PHPUnit\Framework\fileExists;

if(!function_exists('image_crop')){
        function image_crop($image_name,$width=550,$height=750){
            if(
                fileExists(storage_path('app/public/images/'.$image_name)) &&
                fileExists(storage_path('app/public/images/thumbnail/'.$image_name)==false)
             ){
                $image_resize=Image::make(storage_path('app/public/images/'.$image_name));
                $image_resize->resize($width,$height);
                $image_resize->save(storage_path('app/public/images/thumbnail/'.$image_name));
            }
        }
    }
?>