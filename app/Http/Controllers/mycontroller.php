<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\monhoc;
use View;
class mycontroller extends Controller
{
	function __construct(){
		$modelmonhoc = new Monhoc();
    	$monhoc = $modelmonhoc->getmonhoc();
		View::share(['monhoc'=>$monhoc]);
	}
    public function monhoc()
    {
    	return view('layouts.content.content');
    }
     public function baihoc()
    {
    	return view('layouts.hocphan.hocphan');
    }
    function getmonhocbyma($mamonhoc){
		$modelmonhoc = new Monhoc();
    	$tieude = $modelmonhoc->gettieudebyma($mamonhoc);
		View::share(['tieude'=>$tieude]);
	}


}
