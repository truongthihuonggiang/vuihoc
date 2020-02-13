<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Monhoc;
use App\Level;
use App\Baihoc;
use App\Color;
use App\Tuvung;
use View;
class Pagecontroller extends Controller
{
	public function getIndex(){
		$monhoc = Monhoc::where('xoa',0)->where('congkhai',1)->get();
		$color= Color::all();
		return view('layouts.content.monhoc',compact('monhoc','color'));
	}
	public function getLevel(){
		$level =Level::where('xoa',0)->where('congkhai',1)->orderBy('ten', 'asc')->get();
		$monhoc = Monhoc::where('xoa',0)->where('congkhai',1)->get();
		$color= Color::all();
		return view('layouts.hocphan.level',compact('level','monhoc','color'));
	}
	public function getBaihoc(){
		$baihoc= Baihoc::where('xoa', 0)->where('congkhai',1) ->orderBy('ten', 'asc')->get();
		$level = Level::all();
		$monhoc = Monhoc::where('xoa',0)->where('congkhai',1)->get();
		$color= Color::all();
		return view('layouts.hocphan.baihoc',compact('level','monhoc','baihoc','color'));
	}
	public function getPhanhoc(){
		$tuvung= Tuvung::where('xoa', 0)->where('congkhai', 1)->get();
		$baihoc= Baihoc::where('xoa', 0)->where('congkhai',1) ->orderBy('ten', 'asc')->get();
		$level = Level::all();
		$monhoc = Monhoc::where('xoa',0)->where('congkhai',1)->get();
		$color= Color::all();
		return view('layouts.hocphan.phanhoc',compact('level','monhoc','baihoc','color','tuvung'));
	}
}