<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table= 'product';


    static public function get_records()
    {
        return self::join('category', 'product.category_id', '=', 'category.id')
    ->join('sub_category', 'product.subcategory_id', '=', 'sub_category.id')
    ->select(
        'product.*', 
        'category.id as category_id',
        'category.category_name as category_name', 
        'sub_category.subcategory_name as subcategory_name', 
        'sub_category.id as subcategory_id'
    )
    ->where('product.is_delete', 0)
    ->where('category.is_delete', 0)
    ->where('sub_category.is_delete', 0)
    ->orderBy('product.id', 'desc')
    ->get();

    }
    static public function get_single($id)
    {
        return self::find($id);
    }

    static public function featured_products()
{
    return self::join('category', 'product.category_id', '=', 'category.id')
    ->join('sub_category', 'product.subcategory_id', '=', 'sub_category.id')
    ->select(
        'product.*', 
        'category.id as category_id',
        'category.category_name as category_name', 
        'sub_category.subcategory_name as subcategory_name', 
        'sub_category.id as subcategory_id'
    )
    ->where('product.is_delete', 0)
    ->where('product.is_featured', 1)
    ->where('category.is_delete', 0)
    ->where('sub_category.is_delete', 0)
    ->orderBy('product.id', 'desc')
    ->get();
}

    static public function cat_product($id)
{
    return self::join('category', 'product.category_id', '=', 'category.id')
    ->join('sub_category', 'product.subcategory_id', '=', 'sub_category.id')
    ->select(
        'product.*', 
        'category.id as category_id',
        'category.category_name as category_name', 
        'sub_category.subcategory_name as subcategory_name', 
        'sub_category.id as subcategory_id'
    )
    ->where('product.is_delete', 0)
    ->where('product.category_id', $id)
    ->where('category.is_delete', 0)
    ->where('sub_category.is_delete', 0)
    ->orderBy('product.id', 'desc')
    ->get();
}
static public function get_cat_subcat_data()
    {
        return self::join('category', 'product.category_id', '=', 'category.id')
        ->join('sub_category', 'product.subcategory_id', '=', 'sub_category.id')
        ->select(
            'product.*', 
            'category.id as category_id',
            'category.category_name as category_name', 
            'sub_category.subcategory_name as subcategory_name', 
            'sub_category.id as subcategory_id'
        )
        ->where('product.is_delete', 0)
        ->where('category.is_delete', 0)
        ->where('sub_category.is_delete', 0)
        ->get();
    }
    
}
