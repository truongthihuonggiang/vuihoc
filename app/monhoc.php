<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
 //	protected $table = ‘hv_monhoc’;
 	public $timestamps = false;

	public function getmonhoc()
    {
        $monhoc = DB::select('select * from hv_monhoc where xoa = 0 and congkhai = 1 order by ten asc');
        return  $monhoc;
    }
    public function gettieudebyma($mamonhoc)
    {
        $monhoc = DB::select("select * from hv_monhoc where mamonhoc='".$mamonhoc."' xoa = 0 and congkhai = 1 order by ten asc");
        return  $monhoc;
    }
}
