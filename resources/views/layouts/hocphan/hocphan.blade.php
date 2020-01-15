@extends('layouts.index')
@section('content')
<?php  ?>
<section class="about-lession" id="services">
		<div class="container pb-lg-4">
@foreach($tieude ?? '' as $row)
		<h4 class="font-weight-bold mb-3 text-center"> {{ $row-> ten }}</h4>
@endforeach
			<div class="row text-center">
				<div class="col-md-3 lession bg-m1">
					<a href="#a">
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<h4 class="text-wh font-weight-bold mb-3"> abc  </h4>
					</div>
					</a>
				</div>
				<div class="col-md-3 lession bg-m3">
					<a href="#a">
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<h4 class="text-wh font-weight-bold mb-3">Bài 2</h4>
					</div>
					</a>
				</div>
				<div class="col-md-3 lession bg-m2">
					<a href="#a">
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<h4 class="text-wh font-weight-bold mb-3">Bài 3</h4>
					</div>
					</a>
				</div>
			</div>
		</div>
	</section>
@endsection