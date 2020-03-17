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

Route::get('index',['uses'=>'Pagecontroller@getIndex']);

Route::get('dangky', function () {
    return view('layouts.content.dangky');
});
Route::get('monhoc', ['uses'=>'Pagecontroller@getIndex']);

Route::get('lienhe', function () {
    return view('layouts.content.lienhe');
});
Route::get('gopy', function () {
    return view('layouts.content.gopy');
});

//Route::get('anhvan',['uses'=>'Pagecontroller@getLevel']);
//Route::get('toan',['uses'=>'Pagecontroller@getLevel']);
//Route::get('tiengviet',['uses'=>'Pagecontroller@getLevel']);
//Route::get('anhvantieuhoc',['uses'=>'Pagecontroller@getLevel']);
Route::get('mon',['uses'=>'Pagecontroller@getLevel']);
Route::get('level',['uses'=>'Pagecontroller@getBaihoc']);
Route::get('bai',['uses'=>'Pagecontroller@getPhanhoc']);
Route::get('xemtu',['uses'=>'Pagecontroller@Xemtu']);
Route::get('nghetu',['uses'=>'Pagecontroller@Nghetu']);
Route::get('viettu',['uses'=>'Pagecontroller@Viettu']);
Route::get('xeplaicau',['uses'=>'Pagecontroller@Xeplaicau']);
Route::get('tracnghiem',['uses'=>'Pagecontroller@Tracnghiem']);
Route::get('timtu',['uses'=>'Pagecontroller@Timtu']);
Route::get('diendapan',['uses'=>'Pagecontroller@Diendapan']);

//đăng nhập
Route::get('dangnhap',['uses'=>'Admincontroller@getNguoidung']);
Route::post('dangnhap',['uses'=>'Admincontroller@Kiemtradangnhap'])->name('dangnhap');