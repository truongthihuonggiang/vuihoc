<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Nguoidung;
use App\Admin;

class Admincontroller extends Controller
{

    public function getNguoidung()
    {
		$nguoidung= Nguoidung::all();
		return view('layouts.content.dangnhap',compact('nguoidung'));
    }
    public function Kiemtradangnhap(Request $request)
    {
    	session_start();
        if (isset($_SESSION['dangnhap']))
        {
            return redirect()->route('index');
        }
        $kiemtra_dangnhap =  new Nguoidung;
		$dienthoai = $request->dienthoai;
        $matkhau = $request->matkhau;;
		if ($kiemtra_dangnhap -> ktdangnhap($dienthoai,$matkhau)) 
		{
            $_SESSION['dangnhap']=true;
            $info = $kiemtra_dangnhap->get_info($dienthoai,$matkhau);
            foreach ($info as $row) 
            {
                $ten = $row->ten;
                $_SESSION['idnguoidung']=$row->idnguoidung;
            }
            $_SESSION['ten'] = isset($ten) ? $ten : "";
            return redirect()->route('index');
        }
        else
        {
            return redirect()->back()->with('error','Sai Email hoặc mật khẩu');
        }
    }

}
