<?php
namespace App\Services;

use Illuminate\Support\Facades\File;

class FileService
{
    public static function save($image){
        $image_extension = $image->getClientOriginalExtension();
        $image_name = md5(date('now').time())."-".uniqid()."."."$image_extension";
        $destinationPath = public_path().'/backend_images/';
        $image->move($destinationPath,$image_name);

        return $image_name;
    }

    public static function delete($image){

        $destination = public_path().'/backend_images/'.$image;

        if ( File::exists($destination)) {
            File::delete($destination);
        }
        return true;
    }


}
