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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',['uses'=>'mycontroller@monhoc']);
Route::get('dangnhap', function () {
    return view('layouts.content.dangnhap');
});
Route::get('dangky', function () {
    return view('layouts.content.dangky');
});
Route::get('lienhe', function () {
    return view('layouts.content.lienhe');
});
Route::get('gopy', function () {
    return view('layouts.content.gopy');
});
Route::get('anhvantieuhoc',['uses'=>'mycontroller@baihoc']);
Route::get('anhvan',['uses'=>'mycontroller@baihoc']);
Route::get('tiengviet',['uses'=>'mycontroller@baihoc']);
Route::get('toan',['uses'=>'mycontroller@baihoc']);


Route::get('anhvantieuhoc/{mamonhoc}',['uses'=>'mycontroller@getmonhocbyma']);