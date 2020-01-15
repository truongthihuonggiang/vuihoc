@extends('layouts.index')
@section('content')

	<div class="newsletter_right_w3w3pvt-lau bg-m3 py-5">
				<div class="text-center">
					<h6 class="text-wh let-spa">Góp ý cho chúng tôi</h6>
					<h3 class="text-wh font-weight-bold mt-2 mb-3">Thank you!</h3>
				</div>
			<div class="row">
				<div class="col-3"></div>
				<div class="col-6 bg-m6">
						<input class="form-control" type="text" name="chatbox" placeholder="">
							<form action="#" method="post">
							<div class="row">
							<div class="col-md-6 form-group pr-md-0">
								<input class="form-control" type="text" name="name" placeholder="Username" required="">
							</div>
							<div class="col-md-2 form-group pr-md-0 mt-md-0 mt-3">
								<button class="btn" type="submit">Send</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-3"></div>
			</div>
	</div>

@endsection
