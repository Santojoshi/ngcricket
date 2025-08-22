<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model
{
    use HasFactory;

    protected $table= 'sub_category';


    static public function get_records()
    {
        return self::select('sub_category.*')->orderBy('sub_category.id', 'desc')->where('is_delete', 0)
        ->get();
    }
    static public function get_single($id)
    {
        return self::find($id);
    }
    
}
