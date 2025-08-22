<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\ProductModel;

class FrontController extends Controller
{
    public function front()
    {           
        $data['category']= CategoryModel::get_records();
        $data['featured']= ProductModel::featured_products();
        $data['products']= ProductModel::get_records();
        return view('front/pages/home', $data);
    }
    public function category_product($id)
    {   
        $data['cat_name']= CategoryModel::get_category_name($id);
        $data['category']= CategoryModel::get_records();
        $data['subcategory']= SubCategoryModel::get_records();
        $data['cat_product']= ProductModel::cat_product($id);

        return view('front/pages/shop', $data);
}
    public function single_product($id)
    {   
        $data['product']= ProductModel::get_single($id);
        return view('front/pages/single', $data);
}

public function showByCategory($id)
{
    $products = ProductModel::cat_product($id);
    $category = CategoryModel::findOrFail($id); 

    return view('front/pages/shop', compact('products', 'category'));
}
}

