<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "type_products";

    // 1 loai san pham co nhieu san pham
    public function product(){
        return $this->hasMany('App\Product','id_type','id');
        // 1: duong dan den model san pham , 2: khoa ngoai cua loai san pham voi san pham , 3 : khoa chinh cua loai san pham
    }
}
