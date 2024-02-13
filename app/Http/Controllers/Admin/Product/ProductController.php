<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
        $brands = Brand::where('status', 1)->get();
        $categorys = Category::where('status', 1)->get();
        return view('admin.product.add', compact('brands', 'categorys'));
    }
}
