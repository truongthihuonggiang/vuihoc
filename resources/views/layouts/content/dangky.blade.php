@extends('layouts.index')
@section('content')
<!-- newsletter -->
	<div class="newsletter_right_w3w3pvt-lau bg-m3 py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h6 class="text-wh let-spa">Signup for Free</h6>
					<h3 class="text-wh font-weight-bold mt-2 mb-3">Wellcome!</h3>
				</div>
			</div>
				<div class="col-lg-8 news-right-w3ls mt-lg-0 mt-4">
					<p class="text-li mb-3">Signup</p>
					<form action="#" method="post">
						<div class="row">
							<div class="col-md-4 form-group pr-md-0">
								<input class="form-control" type="text" name="name" placeholder="Username" required="">
							</div>
							<div class="col-md-4 form-group pr-md-0">
								<input class="form-control" type="password" name="pass" placeholder="Password" required="">
							</div>
							<div class="col-md-4 form-group pr-md-0">
								<input class="form-control" type="text" name="phone" placeholder="Phonenumber" required="">
							</div>
							<div class="col-md-2 form-group pr-md-0 mt-md-0 mt-3">
								<button class="btn" type="submit">Signup</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
<!-- //newsletter -->
@endsection
