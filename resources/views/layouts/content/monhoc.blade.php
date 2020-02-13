@extends('layouts.index')
@section('content')
<!-- banner -->
	<div class="banner_w3lspvt">
			<ul class="banner banner1">
			</ul>
		</div>
	</div>
<!-- //banner -->

<section class="about-lession" id="services">
	<div class="container pb-lg-4">
		<div class="row text-center">
		@foreach($monhoc ?? '' as $row)
		@foreach($color ?? '' as $row2)
				@if($row->id % 6== $row2->id)
				<div class="col-md-6 lession {{ $row2->mau }}">
					<a href="{{ 'mon'.'?mamonhoc='.$row->id }}">
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


<!-- brands -->
	<section class="brands pt-5">
		<div class="container-fluid">
			<div class="row text-center">
				<div class="col-md-3 col-3 main-brand bg-m1">
					<a href="">
					<span class="fa fa-headphones mb-3" aria-hidden="true"></span>
					<h5>Nghe</h5>
					</a>
				</div>
				<div class="col-md-3 col-3 main-brand bg-m4">
					<a href="">
					<span class="fa fa-volume-up mb-3" aria-hidden="true"></span>
					<h5>Nói</h5>
					</a>
				</div>
				<div class="col-md-3 col-3 main-brand bg-m3">
					<a href="">
					<span class="fa fa-book mb-3" aria-hidden="true"></span>
					<h5>Đọc</h5>
					</a>
				</div>
				<div class="col-md-3 col-3 main-brand bg-m1">
					<a href="">
					<span class="fa fa-pencil mb-3" aria-hidden="true"></span>
					<h5>Viết</h5>
					</a>
				</div>
			</div>
		</div>
	</section>
<!-- //brands -->
@endsection