@extends('layouts.index')
@section('content')
<?php
if(session('error')){
	echo $errors;
} 
?>
	<div class="newsletter_right_w3w3pvt-lau bg-m3 py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 border-right">
					<h6 class="text-wh let-spa">Signup for Free</h6>
					<h3 class="text-wh font-weight-bold mt-2 mb-3">Wellcome!</h3>
				</div>
				<div class="col-lg-8 news-right-w3ls mt-lg-0 mt-4">
					<p class="text-li mb-3">Signin</p>
					<form action="{{ route('dangnhap')}}" method="post"> 
						{!!csrf_field()!!}
						<div class="row">
							<div class="col-md-5 form-group pr-md-0">
								<input class="form-control name" type="text" name="dienthoai" placeholder="Username" required="">
							</div>
							<div class="col-md-5 form-group pr-md-0">
								<input class="form-control pass" type="password" name="matkhau" placeholder="Password" required="">
							</div>
							<div class="col-md-2 form-group pr-md-0 mt-md-0 mt-3">
								<button class="btn" type="submit">Signin</button>
							</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</script>
@endsection
