@extends('layouts.index')
@section('content')
<?php
class Danhsach
{
	public $id;
	public $ten;
	public $ma;
}

$a = array();
$i=0;
foreach($tuvung ?? '' as $row)
	if($_GET['bai']==$row->idbai)
	{
		$i++;
	}
if ($i >0 )
{
	$ds = new Danhsach();
	$ds->id ='1';
	$ds->ten='Xem từ';
	$ds->ma='xemtu';
	array_push($a,$ds);

	$ds = new Danhsach();
	$ds->id ='2';
	$ds->ten='Nghe từ';
	$ds->ma='nghetu';
	array_push($a,$ds);

	$ds = new Danhsach();
	$ds->id ='3';
	$ds->ten='Viết từ';
	$ds->ma='viettu';
	array_push($a,$ds);

	$ds = new Danhsach();
	$ds->id ='4';
	$ds->ten='Tìm từ';
	$ds->ma='timtu';
	array_push($a,$ds);

}
$i=0;
foreach ($nghebai as $row2) 
if($_GET['bai']==$row2->id_bai)
	{
		$i++;
	}
if($i>0)
{
	$ds = new Danhsach();
	$ds->id ='5';
	$ds->ten='Nghe viết';
	$ds->ma='ngheviet';
	array_push($a,$ds);
}
$i=0;
foreach ($cauhoilon as $row3) 
if($_GET['bai']==$row3->id_bai and $row3->loai=="Nghe")
	{
		$i++;
	}
if($i>0)
{
	$ds = new Danhsach();
	$ds->id ='6';
	$ds->ten='Trắc nghiệm';
	$ds->ma='tracnghiem';
	array_push($a,$ds);
}
$i=0;
foreach ($cauhoilon as $row3) 
if($_GET['bai']==$row3->id_bai and $row3->loai=="Toan")
	{
		$i++;
	}
if($i>0)
{
	$ds = new Danhsach();
	$ds->id ='7';
	$ds->ten='Điền đáp án';
	$ds->ma='diendapan';
	array_push($a,$ds);
}
$i=0;
foreach ($nghexepcau as $row4) 
if($_GET['bai']==$row4->idbai)
	{
		$i++;
	}
if($i>0)
{
	$ds = new Danhsach();
	$ds->id ='8';
	$ds->ten='Xếp lại câu';
	$ds->ma='xeplaicau';
	array_push($a,$ds);
}
?>

<section class="about-lession" id="services">
	<div class="container pb-lg-4">
@foreach($monhoc?? '' as $row1)
@if( $_GET['mamonhoc'] == $row1->id)
	<h4 class="font-weight-bold mb-3 text-center"> {{$row1->ten }}</h4>
	@endif
@endforeach	
		<div class="row text-center">
		@foreach($a ?? '' as $row)
		@foreach($color ?? '' as $row2)
				@if($row->id % 6== $row2->id)
				<div class="col-md-3 lession {{ $row2->mau }}">
					<a href="{{$row->ma.'?phanhoc='.$row->id.'&bai='.$_GET['bai'].'&level='.$_GET['level'].'&mamonhoc='.$_GET['mamonhoc'] }}">
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<h4 class="text-wh font-weight-bold mb-3"> {{ $row -> ten}} </h4>
					</div>
					</a>
				</div>
				@endif
		@endforeach	
		@endforeach	
			</div>
		</div>
	</section>
@endsection