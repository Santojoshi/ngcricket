<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;

    protected $table= 'banner';


    static public function get_records()
    {
        return self::select('banner.*')->orderBy('banner.id', 'desc')
        ->get();
    }
    static public function get_single($id)
    {
        return self::find($id);
    }
    
}
