@extends('layouts.index')
@section('content')
	<!-- contact -->
	<section class="contact pb-5" id="contact">
		<div class="container pb-xl-5 pb-lg-3">
			<h3 class="text-bl text-center font-weight-bold mb-2">Liên hệ với chúng tôi</h3>
			<h6 class="text-colors text-center let-spa mb-5">Get In Touch</h6>
			<div class="row mx-sm-0 mx-2">
				<!-- map -->
				<div class="col-lg-6 map" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249092.68240072284!2d107.81697505184012!3d12.708647718048747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f7d4216cd2fb%3A0x9f4a5ec2f999fb4!2zVHAuIEJ1w7RuIE1hIFRodeG7mXQsIMSQ4bqvayBM4bqvaywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1578880160987!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
				<!-- //map -->
				<!-- contact form -->
				<div class="col-lg-6 main_grid_contact" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
					<div class="form-w3ls p-md-5 p-4">
						<h4 class="mb-4 sec-title-w3 let-spa text-bl">Send us a message</h4>
						<form action="#" method="post">
							<div class="row">
								<div class="col-sm-6 form-group pr-sm-1">
									<input class="form-control" type="text" name="Name" placeholder="Name" required="">
								</div>
								<div class="col-sm-6 form-group pl-sm-1">
									<input class="form-control" type="email" name="Email" placeholder="Email" required="">
								</div>
							</div>
							<div class="form-group">
								<input class="form-control" type="text" name="Subject" placeholder="Subject" required="">
							</div>
							<div class="form-group">
								<input class="form-control" type="text" name="Phone Number" placeholder="Phone Number" required="">
							</div>
							<div class="form-group">
								<textarea name="message" placeholder="Message" required=""></textarea>
							</div>
							<div class="input-group1 text-right">
								<button class="btn" type="submit">Submit</button>
							</div>
						</form>
					</div>
				</div>
				<!-- //contact form -->
			</div>
		</div>
	</section>
	<!-- //contact -->
@endsection
