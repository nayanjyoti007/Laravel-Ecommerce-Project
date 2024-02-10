<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.brand_view', compact('brands'));
    }

    public function BrandAdd()
    {
        return view('admin.brand.brand_add');
    }

    public function BrandStore(Request $request)
    {
        $this->validate($request, [
            // 'id' => 'required|numeric|exists:admins,id',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'brnad_name_en' => 'required|string|max:100',
            'brnad_name_hin' => 'required|string|max:100',
        ]);

        // $image = $request->file('image');
    	// Image::make($image)->resize(300,300)->save('backend_images/'.$name_gen);
    	// $save_url = 'backend_images/'.$name_gen;

        if($request->file('image')){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image = $image->resize(300,300);
            $image->toJpeg()->save(base_path('public/backend_images/uploads/brand/'.$name_gen));
            $save_url = 'backend_images/uploads/brand/'.$name_gen;
        }
    }
}
