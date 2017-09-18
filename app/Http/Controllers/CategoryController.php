<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getList(){

        $loai = ProductType::all();
        return view('admin.theloai.cate_list',compact('loai'));
    }
    public function getAdd(){
        return view('admin.theloai.cate_them');
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:100'
        ],[
            'name.required'=>'Ban chua nhap ten the loai',
            'name.min'=>'Ten the loai toi thieu 3 ki tu',
            'name.max'=>'Ten the loai toi da 100 ki tu'
        ]);
        $cate = new ProductType;
        $cate->name = $request->name;
        $cate->description = $request->description;
        $cate->image = $request->image;
        $cate->save();

        return redirect()->route('listtheloai')->with('thongbao','Them thanh cong');
    }
    public function getEdit($id){
        $loai = ProductType::find($id);
        return view('admin.theloai.cate_sua',compact('loai'));
    }
    public function postEdit(Request $request,$id){
        $cate = ProductType::find($id);

        $this->validate($request,[
            'name'=>'required|min:3|max:100'
        ],[
            'name.required'=>'Ban chua nhap ten the loai',
            'name.min'=>'Ten the loai toi thieu 3 ki tu',
            'name.max'=>'Ten the loai toi da 100 ki tu'
        ]);
        $cate->name = $request->name;
        $cate->description = $request->description;
        $cate->save();

        return redirect()->route('listtheloai')->with('thongbao1','Sua thanh cong');
    }
    public function getDelete($id){
        $cate = ProductType::find($id);
        $cate->delete();

        return redirect()->route('listtheloai')->with('thongbao2','Xoa thanh cong');
    }

}
