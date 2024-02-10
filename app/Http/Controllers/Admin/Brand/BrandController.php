<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Services\ImageResize;
use App\Services\SlugGenerator;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.brand_list', compact('brands'));
    }

    public function form($id = null)
    {
        if ($id) {
            $data = Brand::findOrFail($id);
            return view('admin.brand.brand_form', compact('data'));
        } else {
            return view('admin.brand.brand_form');
        }
    }

    public function submit(Request $request)
    {
        $this->validate($request, [
            'id' => 'nullable|numeric|exists:brands,id',
            'image' => 'required_without:id|image|mimes:jpg,jpeg,png,gif',
            'brnad_name_en' => 'required|string|max:100',
            'brnad_name_hin' => 'required|string|max:100',
        ]);


        $id = $request->id;

        if ($id) {
            $brand = Brand::findOrFail($id);
            $msg = "Brand Update Successfully !!";
        } else {
            $brand = new Brand();
            $msg = "Brand Add Successfully !!";
        }

        $brand->brnad_name_en = $request->brnad_name_en;
        $brand->brnad_name_hin = $request->brnad_name_hin;
        $brand->brnad_slug_en = SlugGenerator::generateSlug($request->brnad_name_en);
        $brand->brnad_slug_hin = str_replace(' ', '-', $request->brnad_name_hin);

        if ($request->hasFile('image')) {
            $folder = 'upload/brand/';
            ImageResize::delete($brand->brnad_image, $folder);
            $brand->brnad_image = ImageResize::save($request->file('image'), 300, 300, $folder);
        }
        $brand->save();

        $notification = array('message' => $msg, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function delete(Request $request)
    {
        try {
            $data = Brand::findOrFail($request->id);
            $folder = 'upload/brand/';
            ImageResize::delete($data->brnad_image, $folder);
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Delete Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
