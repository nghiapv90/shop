<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function getLogin(){
        return view('admin.admin_login');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],[
            'email.required'=>'Vui long nhap email',
            'email.email'=>'email khong dung dinh dand',
            'password.required'=>'Vui long nhap password',
            'password.min'=>'mat khau it nhat 6 ky tu',
            'password.max'=>'mat khau toi da khong qua 20 ky tu'
        ]);
        $credentilas = array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($credentilas)){
            return redirect()->route('listtheloai');
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','thongbao'=>'Đăng nhập không thành công']);
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect(route('trang-chu'));
    }
}
