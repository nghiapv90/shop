<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getList(){
        $sanpham = DB::table('products')
            ->join('type_products','products.id_type','=','type_products.id')
            ->select('products.id','products.name','products.unit_price','products.promotion_price','products.created_at','type_products.name as nameTypeProducts')
            ->paginate(10);
        $allsanpham = DB::table('products')->get();
        $loai = DB::table('type_products')->get();
        return view('admin.sanpham.pro_list',compact('sanpham','allsanpham','loai'));

    }
    public function getAdd(){
        $loai = DB::table('type_products')->get();
        return view('admin.sanpham.pro_them',compact('loai'));
    }
    public function postAdd(Request $request){
            /*$this->validate($request,[
                'name'=>'required|unique:products'
            ],[
                'name.required'=>'Ban chua nhap ten san pham',
                'name.unique'=>'Ten product da ton tai'
            ]);
            $product = new Product;
            $product->name = $request->name;
            $product->id_type = $request->theloai;
            $product->description = $request->description;
            $product->unit_price = $request->unit_price;
            $product->promotion_price = $request->promotion_price;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = str_random(5) . '.' . $file->getClientOriginalName();
                $file->move(public_path("source/upload/images/san-pham"), $imageName);
                $product->image = $imageName;
            }
            $product->save();
        dd($request);*/
        $dl = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = str_random(5) . '.' . $file->getClientOriginalName();
            $file->move(public_path("source/admin/upload/images/san-pham"), $imageName);
            $dl['image'] = $imageName;
        };
        $add = array(
            'name'=>$dl['name'],
            'id_type'=>$dl['theloai'],
            'description'=>$dl['description'],
            'image'=>$dl['image'],
            'unit_price'=>$dl['unit_price'],
            'promotion_price'=>$dl['promotion_price'],
            'unit'=>$dl['unit'],
            'new'=>$dl['new']
        );
        DB::table('products')->insert($add);
        return redirect()->route('listsanpham')->with('thongbao','Them san pham moi thanh cong');
    }
    public function getEdit($id){
        $edit = Product::find($id);
        $loai = DB::table('type_products')->get();
        return view('admin.sanpham.pro_sua',compact('edit','loai'));
    }
    public function postEdit(Request $request, $id){
        $data = $request->all();
        $update = array(
            'name'=>$data['name'],
            'id_type'=>$data['theloai'],
            'description'=>$data['description'],
            'unit_price'=>$data['unit_price'],
            'promotion_price'=>$data['promotion_price'],
            'unit'=>$data['unit'],
            'new'=>$data['new']
        );
        $product = DB::table('products')->where('id',$id)->update($update);

        return redirect()->route('listsanpham')->with('thongbaoo','Sua san pham thanh cong');
    }
    public function getDelete($id){
        $product = DB::table('products')->where('id',$id);
        $product->delete();

        return redirect()->route('listsanpham')->with('thongbao1','Xoa san pham thanh cong');
    }
}
