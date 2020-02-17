@extends('layouts.index')
@section('content')


<section class="about-ex" id="services">
	<div class="container pb-lg-4">

		<div class="row text-center">
		@foreach($tuvung ?? '' as $row)
				@if($_GET['bai']==$row->idbai)
				<div class="px ex bg-wh">
					<a href=>
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<h1 class="text-red font-weight-bold mb-3"> {{ $row ->ketqua}} </h1>
					</div>
					</a>
				</div>
				@endif
		@endforeach	
		</div>
	</div>
</section>

@endsection