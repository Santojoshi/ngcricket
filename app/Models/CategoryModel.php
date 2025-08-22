<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table= 'category';


    static public function get_records()
    {
        return self::where('is_delete', 0)
           ->orderBy('id', 'asc')
           ->get();
    }
    static public function get_category_name($id)
    {
        $category= self::where('id', $id)->first();
        return $category ? $category->category_name : null; 

    }
    static public function get_single($id)
    {
        return self::find($id);
    }
    static public function get_cat_subcat_data()
{
    return self::join('product as p', 'p.category_id', '=', 'category.id') // Alias 'p' for product
    ->join('sub_category as sc', 'p.subcategory_id', '=', 'sc.id') // Alias 'sc' for sub_category
    ->select(
        'p.*',                  // Select fields from products table
        'category.id as category_id',
        'category.category_name as category_name',
        'sc.subcategory_name as subcategory_name',
        'sc.id as subcategory_id'
    )
    ->where('p.is_delete', 0)
    ->where('p.is_featured', 1)
    ->where('category.is_delete', 0)
    ->where('sc.is_delete', 0)
    ->orderBy('p.id', 'desc')
    ->get();
}

    
}
