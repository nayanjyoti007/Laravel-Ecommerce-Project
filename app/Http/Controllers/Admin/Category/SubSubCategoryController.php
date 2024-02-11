<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Services\SlugGenerator;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function list()
    {
        $sub_subcategory = SubSubCategory::latest()->get();
        return view('admin.sub_sub_category.sub_sub_category_list', compact('sub_subcategory'));
    }

    public function form($id = null)
    {
        $categorys = Category::where('status', 1)->get();
        if ($id) {
            $data = SubSubCategory::findOrFail($id);
            return view('admin.sub_sub_category.sub_sub_category_form', compact('data','categorys'));
        } else {
            return view('admin.sub_sub_category.sub_sub_category_form', compact('categorys'));
        }
    }

    public function submit(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'id' => 'nullable|numeric|exists:sub_sub_categories,id',
            'sub_sub_category_name_en' => 'required|string|max:100',
            'sub_sub_category_name_hin' => 'required|string|max:100',
            'category' => 'required|numeric',
            'sub_category' => 'required|numeric',
        ]);


        $id = $request->id;

        if ($id) {
            $category = SubSubCategory::findOrFail($id);
            $msg = "Sub Sub Category Update Successfully !!";
        } else {
            $category = new SubSubCategory();
            $msg = "Sub Sub Category Add Successfully !!";
        }

        $category->category_id = $request->category;
        $category->sub_category_id = $request->sub_category;
        $category->sub_sub_category_name_en = $request->sub_sub_category_name_en;
        $category->sub_sub_category_name_hin = $request->sub_sub_category_name_hin;
        $category->sub_sub_category_slug_en = SlugGenerator::generateSlug($request->sub_sub_category_name_en);
        $category->sub_sub_category_slug_hin = str_replace(' ', '-', $request->sub_sub_category_name_hin);
        $category->save();

        $notification = array('message' => $msg, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function delete(Request $request)
    {
        try {
            $data = SubSubCategory::findOrFail($request->id);
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Delete Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function fetchSubCat($id){
        $data = SubCategory::where('category_id', $id)->get();
        return $data;
    }
}
