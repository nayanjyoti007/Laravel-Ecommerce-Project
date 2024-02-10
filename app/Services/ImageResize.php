<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageResize
{
    public static function save($image,$width,$height,$folder)
    {
        $manager = new ImageManager(new Driver());
        $image_extension = $image->getClientOriginalExtension();
        $image_name = md5(date('now') . time()) . "-" . uniqid() . "." . "$image_extension";
        $image = $manager->read($image);
        $image = $image->resize($width, $height);
        $image->toJpeg()->save(public_path().'/backend_images/'.$folder . $image_name);
        return $image_name;
    }

    public static function delete($image,$folder)
    {

        $destination = public_path() . '/backend_images/'.$folder . $image;

        if (File::exists($destination)) {
            File::delete($destination);
        }
        return true;
    }
}
