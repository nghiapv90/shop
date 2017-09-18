<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->dangnhap();
    }

    function dangnhap(){
        // kiem tra xem co dang dang nhap hay khong
        if(Auth::check()){
            view()->share('user_login',Auth::user());
            //tat ca cac view nao dang dang nhap deu co cai view share nay
        }
    }
}
