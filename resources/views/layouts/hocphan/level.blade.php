@extends('layouts.index')
@section('content')
<section class="about-lession" id="services">
	<div class="container pb-lg-4">
@foreach($monhoc?? '' as $row1)
@if( $_GET['mamonhoc'] == $row1->id)
	<h4 class="font-weight-bold mb-3 text-center"> {{$row1->ten }}</h4>
	@endif
@endforeach	
		<div class="row text-center">
		@foreach($level ?? '' as $row)
		@foreach($color ?? '' as $row2)
		@if( $_GET['mamonhoc'] == $row->idmon)
			
				@if($row->id % 6== $row2->id)
				<div class="col-md-3 lession {{ $row2->mau }}">
					<a href="{{'level'.'?level='.$row->id.'&mamonhoc='.$_GET['mamonhoc'] }}">
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<h4 class="text-wh font-weight-bold mb-3"> {{ $row -> ten}} </h4>
					</div>
					</a>
				</div>
				@endif
		@endif
			@endforeach	
		@endforeach	
			</div>
		</div>
	</section>
@endsection