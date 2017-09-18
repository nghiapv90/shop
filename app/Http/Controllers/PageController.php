<?php

namespace App\Http\Controllers;
use App\Bill;
use App\BillDetail;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Customer;
use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Auth;


class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
       // return view('page.trangchu',['slide'=>$slide]); // cach 1

        $new_product = Product::where('new',1)->paginate(8);

        $sanpham_khuyenmai = Product::where('promotion_price','<>','0')->paginate(12);

        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai')); // cach 2
    }

    public function getLoaisp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(6);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

    public function getChitiet(Request $request){
        $sanpham = Product::where('id',$request->id)->first(); // first : moi san pham chi co 1 id duy nhat
        $type = $sanpham->id_type;
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        $sp_khac = Product::where('id_type','<>',$type)->paginate(6);

        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','sp_khac'));
    }

    public function getLienhe(){
        return view('page.lienhe');
    }
    public function getGioithieu(){
        return view('page.gioithieu');
    }

    public function getAddtoCart(Request $request,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);

        return redirect()->back();
    }

    public function delItemCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function getCheckout(){
        return view('page.dat_hang');
    }
    public function postCheckout(Request $request){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email= $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone;
        $customer->note = $request->note;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order= date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->note = $request->note;
        $bill->save();

        foreach ($cart->items as $key => $value){
        $bill_detail = new BillDetail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product = $key;
        $bill_detail->quantity =  $value['qty'];
        $bill_detail->unit_price = ($value['price']/$value['qty']);
        $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }
    public function getLogin(){
        return view('page.login');
    }
    public function getRegister(){
        return view('page.register');
    }
    public function postRegister(Request $request){
        $this->validate($request,[
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'fullname'=>'required',
            're_password'=>'required|same:password'
        ],[
            'email.required'=>'Vui long nhap email ',
            'email.email'=>'Khong dung dinh dang email',
            'email.unique'=>'Email da co nguoi su dung',
            'password.required'=>'Vui long nhap password',
            'password.min'=>'Password co toi thieu tu 6 ki tu tro len',
            're_password.same'=>'Mat khau khong giong nhau'
        ]);
        $user = new User();
        $user->full_name = $request->fullname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;

        $user->save();
        return redirect()->back()->with('thongbao','Tạo tài khoản thành công');

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
            return redirect()->route('trang-chu');
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','thongbao'=>'Đăng nhập không thành công']);
        }
    }
    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    public function getSearch(Request $request){
        $product = Product::where('name','like','%'.$request->key.'%')
                            ->orWhere('unit_price',$request->key)
                            ->get();
        return view('page.search',compact('product'));
    }

}
