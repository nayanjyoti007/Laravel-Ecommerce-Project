<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\SlugGenerator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $category = Category::latest()->get();
        return view('admin.category.category_list', compact('category'));
    }

    public function form($id = null)
    {
        if ($id) {
            $data = Category::findOrFail($id);
            return view('admin.category.category_form', compact('data'));
        } else {
            return view('admin.category.category_form');
        }
    }

    public function submit(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'id' => 'nullable|numeric|exists:categories,id',
            'category_name_en' => 'required|string|max:100',
            'category_name_hin' => 'required|string|max:100',
            'category_icon' => 'required|string|max:100',
        ]);


        $id = $request->id;

        if ($id) {
            $category = Category::findOrFail($id);
            $msg = "Category Update Successfully !!";
        } else {
            $category = new Category();
            $msg = "Category Add Successfully !!";
        }

        $category->category_name_en = $request->category_name_en;
        $category->category_name_hin = $request->category_name_hin;
        $category->category_slug_en = SlugGenerator::generateSlug($request->category_name_en);
        $category->category_slug_hin = str_replace(' ', '-', $request->category_name_hin);
        $category->category_icon = $request->category_icon;
        $category->save();

        $notification = array('message' => $msg, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function delete(Request $request)
    {
        try {
            $data = Category::findOrFail($request->id);
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Delete Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
