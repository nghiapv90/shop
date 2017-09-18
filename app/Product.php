<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    // mot san pham se thuoc 1 loai san pham
    public function product_type(){
        return $this->belongsTo('App\ProductType','id_type','id');
    }

    // nhieu san pham co nhieu trong chi tiet hoa don
    public  function bill_detail(){
        return $this->belongsTo('App\Product','id_product','id');
    }



}
