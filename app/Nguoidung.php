<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nguoidung extends Model
{
    protected $table = "hv_nguoidung";
    function ktdangnhap($dienthoai,$matkhau)
    {
    	$matkhau = md5($matkhau);
    	$nguoidung= $this->where('dienthoai','=',"$dienthoai")->where('matkhau','=',"$matkhau")->get(); //
    	if (count($nguoidung)>0) {
    		return true;
    	}
    	return false;
    }
    function get_info($dienthoai,$matkhau)
    {
        $matkhau = md5($matkhau);
        $tb = $this->where('dienthoai','=',"$dienthoai")->where('matkhau','=',"$matkhau")->get();
        return $tb;
    }

}
