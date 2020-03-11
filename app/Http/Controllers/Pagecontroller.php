<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Monhoc;
use App\Level;
use App\Baihoc;
use App\Color;
use App\Tuvung;
use App\Nghebai;
use App\Cauhoilon;
use App\Nghexepcau;
use App\Cauhoinho;
use App\Dapan;
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
		$nghebai=Nghebai::all();
		$cauhoilon=Cauhoilon::where('xoa',0)->where('congkhai',1)->get();
		$nghexepcau=Nghexepcau::where('xoa', 0)->where('congkhai', 1)->get();
		$baihoc= Baihoc::where('xoa', 0)->where('congkhai',1) ->orderBy('ten', 'asc')->get();
		$level = Level::all();
		$monhoc = Monhoc::where('xoa',0)->where('congkhai',1)->get();
		$color= Color::all();
		return view('layouts.hocphan.phanhoc',compact('level','monhoc','baihoc','color','tuvung','nghebai','cauhoilon','nghexepcau'));
	}
	public function Xemtu(){
		$tuvung= Tuvung::where('xoa', 0)->where('congkhai', 1)->get();
		$nghebai=Nghebai::all();
		$cauhoilon=Cauhoilon::where('xoa',0)->where('congkhai',1)->get();
		$nghexepcau=Nghexepcau::where('xoa', 0)->where('congkhai', 1)->get();
		$baihoc= Baihoc::where('xoa', 0)->where('congkhai',1) ->orderBy('ten', 'asc')->get();
		$level = Level::all();
		$monhoc = Monhoc::where('xoa',0)->where('congkhai',1)->get();
		$color= Color::all();
		return view('layouts.hocphan.xemtu',compact('level','monhoc','baihoc','color','tuvung','nghebai','cauhoilon','nghexepcau'));
	}
	public function Nghetu(){
		$tuvung= Tuvung::where('xoa', 0)->where('congkhai', 1)->get();
		$nghebai=Nghebai::all();
		$cauhoilon=Cauhoilon::where('xoa',0)->where('congkhai',1)->get();
		$nghexepcau=Nghexepcau::where('xoa', 0)->where('congkhai', 1)->get();
		$baihoc= Baihoc::where('xoa', 0)->where('congkhai',1) ->orderBy('ten', 'asc')->get();
		$level = Level::all();
		$monhoc = Monhoc::where('xoa',0)->where('congkhai',1)->get();
		$color= Color::all();
		return view('layouts.hocphan.nghetu',compact('level','monhoc','baihoc','color','tuvung','nghebai','cauhoilon','nghexepcau'));
	}
	public function Viettu(){
		$tuvung= Tuvung::where('xoa', 0)->where('congkhai', 1)->get();
		$nghebai=Nghebai::all();
		$cauhoilon=Cauhoilon::where('xoa',0)->where('congkhai',1)->get();
		$nghexepcau=Nghexepcau::where('xoa', 0)->where('congkhai', 1)->get();
		$baihoc= Baihoc::where('xoa', 0)->where('congkhai',1) ->orderBy('ten', 'asc')->get();
		$level = Level::all();
		$monhoc = Monhoc::where('xoa',0)->where('congkhai',1)->get();
		$color= Color::all();
		return view('layouts.hocphan.viettu',compact('level','monhoc','baihoc','color','tuvung','nghebai','cauhoilon','nghexepcau'));
	}
	public function Xeplaicau(){
		$tuvung= Tuvung::where('xoa', 0)->where('congkhai', 1)->get();
		$nghebai=Nghebai::all();
		$cauhoilon=Cauhoilon::where('xoa',0)->where('congkhai',1)->get();
		$nghexepcau=Nghexepcau::where('xoa', 0)->where('congkhai', 1)->get();
		$baihoc= Baihoc::where('xoa', 0)->where('congkhai',1) ->orderBy('ten', 'asc')->get();
		$level = Level::all();
		$monhoc = Monhoc::where('xoa',0)->where('congkhai',1)->get();
		$color= Color::all();
		return view('layouts.hocphan.xeplaicau',compact('level','monhoc','baihoc','color','tuvung','nghebai','cauhoilon','nghexepcau'));
	}
	public function Tracnghiem(){
		$tuvung= Tuvung::where('xoa', 0)->where('congkhai', 1)->get();
		$nghebai=Nghebai::all();
		$cauhoilon=Cauhoilon::where('xoa',0)->where('congkhai',1)->get();
		$nghexepcau=Nghexepcau::where('xoa', 0)->where('congkhai', 1)->get();
		$baihoc= Baihoc::where('xoa', 0)->where('congkhai',1) ->orderBy('ten', 'asc')->get();
		$level = Level::all();
		$monhoc = Monhoc::where('xoa',0)->where('congkhai',1)->get();
		$color= Color::all();
		$cauhoinho= Cauhoinho::where('xoa',0)->get();
		$dapan=Dapan::where('xoa',0)->get();
		return view('layouts.hocphan.tracnghiem',compact('level','monhoc','baihoc','color','tuvung','nghebai','cauhoilon','nghexepcau','cauhoinho','dapan'));
	}
	public function Timtu(){
		$tuvung= Tuvung::where('xoa', 0)->where('congkhai', 1)->get();
		$nghebai=Nghebai::all();
		$cauhoilon=Cauhoilon::where('xoa',0)->where('congkhai',1)->get();
		$nghexepcau=Nghexepcau::where('xoa', 0)->where('congkhai', 1)->get();
		$baihoc= Baihoc::where('xoa', 0)->where('congkhai',1) ->orderBy('ten', 'asc')->get();
		$level = Level::all();
		$monhoc = Monhoc::where('xoa',0)->where('congkhai',1)->get();
		$color= Color::all();
		$cauhoinho= Cauhoinho::where('xoa',0)->get();
		$dapan=Dapan::where('xoa',0)->get();
		return view('layouts.hocphan.timtu',compact('level','monhoc','baihoc','color','tuvung','nghebai','cauhoilon','nghexepcau','cauhoinho','dapan'));
	}
}