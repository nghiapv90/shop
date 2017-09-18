<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('index',[
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);

Route::get('loai-sanpham/{type}',[
    'as'=>'loaisanpham',
    'uses'=>'PageController@getLoaisp'
]);

Route::get('chitiet-sanpham/{id}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getChitiet'
]);

Route::get('lienhe',[
    'as'=>'lienhe',
    'uses'=>'PageController@getLienhe'
]);
Route::get('gioithieu',[
    'as'=>'gioithieu',
    'uses'=>'PageController@getGioithieu'
]);
Route::get('add-to-cart/{id}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'PageController@delItemCart'
]);

//Route::get('view-dat-hang', function (){
//    return view('page.dat_hang');
//});
Route::get('admin-dangnhap',[
    'as'=>'getadminlogin',
    'uses'=> 'UserController@getLogin'
    ]);
Route::post('admin-dangnhap',[
    'as'=>'postadminlogin',
    'uses'=>'UserController@postLogin'
]);
Route::get('admin-logout',[
    'as'=> 'adminlogout',
    'as'=>'UserController@getLogout'
]);

Route::get('view-dat-hang',[
    'as'=>'viewdathang',
    'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
    'as'=>'dathang',
    'uses'=>'PageController@postCheckout'
]);
Route::get('dang-nhap',[
    'as'=>'dangnhap',
    'uses'=>'PageController@getLogin'
]);
Route::get('dang-ki',[
    'as'=>'dangki',
    'uses'=>'PageController@getRegister'
]);
Route::post('dang-ki',[
    'as'=>'dangki',
    'uses'=>'PageController@postRegister'
]);
Route::post('dang-nhap',[
    'as'=>'dangnhap',
    'uses'=>'PageController@postLogin'
]);
Route::get('dang-xuat',[
    'as'=>'dangxuat',
    'uses'=>'PageController@postLogout'
]);
Route::get('search',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function (){
    Route::group(['prefix'=>'theloai'],function (){
        //admin/theloai/list-theloai
        Route::get('list-theloai',[
           'as'=>'listtheloai',
            'uses'=>'CategoryController@getList'
        ]);
        Route::get('sua-theloai/{id}',[
            'as'=>'suatheloai',
            'uses'=>'CategoryController@getEdit'
        ]);

        Route::post('sua-theloai/{id}',[
            'as'=>'suatheloai',
            'uses'=>'CategoryController@postEdit'
        ]);
        Route::get('them-theloai',[
            'as'=>'themtheloai',
            'uses'=>'CategoryController@getAdd'
        ]);

        Route::get('xoa-theloai/{id}',[
            'as'=>'xoatheloai',
            'uses'=>'CategoryController@getDelete'
        ]);
        Route::post('them-theloai',[
           'as'=>'themtheloai',
           'uses'=>'CategoryController@postAdd'
        ]);
    });

    Route::group(['prefix'=>'sanpham'],function () {
        Route::get('list-sanpham', [
            'as' => 'listsanpham',
            'uses' => 'ProductController@getList'
        ]);
        Route::get('sua-sanpham/{id}', [
            'as' => 'suasanpham',
            'uses' => 'ProductController@getEdit'
        ]);

        Route::post('sua-sanpham/{id}', [
            'as' => 'suasanpham',
            'uses' => 'ProductController@postEdit'
        ]);
        Route::get('them-sanpham', [
            'as' => 'themsanpham',
            'uses' => 'ProductController@getAdd'
        ]);

        Route::get('xoa-sanpham/{id}', [
            'as' => 'xoasanpham',
            'uses' => 'ProductController@getDelete'
        ]);
        Route::post('them-sanpham', [
            'as' => 'themsanpham',
            'uses' => 'ProductController@postAdd'
        ]);
//        Route::get('sanpham/{idtheloai}',[
//            'as'=>'getSanPham',
//            'uses'=>'AjaxController@getProduct'
//        ]);
    });
});