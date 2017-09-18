<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getProduct($idtheloai){
        $product = Product::where('id_type',$idtheloai)->get();
        foreach ($product as $p){

            echo "<td>'".$p->name."'</td>";
        }
     }
}
?>