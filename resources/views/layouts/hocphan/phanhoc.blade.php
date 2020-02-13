@extends('layouts.index')
@section('content')

$danhsach = array();
@foreach($tuvung ?? '' as $row)
	@if($_GET['bai']==$row->idbai)
	$i = 0;
		while ($row2 = mysqli_fetch_array($row)) 
		{
			$i++;
		}
		@if( $i ?? '' > 0)
		{
			array_fill_keys(1,'Xem từ');
		}
		@endif
	@endif
@endforeach
	echo $danhsach;
@endsection