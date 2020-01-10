<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>HOCVUI</title>
<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="{{asset('bootstrap/bootstrap/dist/css/bootstrap.css')}}">
	
<!-- banner slider -->
	<link href="{{asset('css/slider.css')}}" type="text/css" rel="stylesheet" media="all">
	
<!-- Style-CSS -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
	
<!-- Font-Awesome-Icons-CSS -->
	<link href="{{asset('fonts/font-awesome.min.css')}}" rel="stylesheet">

<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=latin-ext"
	 rel="stylesheet">

</head>
<body>
<!-- header -->
	<header id="home">
	<!-- top-bar -->
		<div class="top-bar py-2 bg-li">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 top-social-w3pvt-am mt-lg-1 mb-md-0 mb-1 text-lg-left text-center">
						<div class="row">
							<div class="col-xl-4 col-12 header-top_w3layouts text-md-center ">
								<p class="text-bl">
									<a href="">Đăng nhập</a>
								</p>
							</div>
							<div class="col-xl-4 col-12 header-top_w3layouts text-md-center">
								<p class="text-bl">
									<a href="">Đăng ký</a>
								</p>
							</div>
							<div class="col-xl-4 col-12 header-top_w3layouts text-md-center">
								<ul class="top-right-info">
									<li>
										<p class="par-so mr-3">Login with:</p>
									</li>
									<li class="mr-1 soci-effe facebook">
										<a href="https://www.facebook.com/">
											<span class="fa fa-facebook-f"></span>
										</a>
									</li>
									<li class="mr-1 soci-effe twitter">
										<a href="#">
											<span class="fa fa-twitter"></span>
										</a>
									</li>
									<li class="mr-1 soci-effe google-plus">
										<a href="#">
											<span class="fa fa-google-plus"></span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>		
						
				</div>
			</div>
		</div>
	</header>

<!-- header 2 -->
	<!-- navigation -->
	<div class="main-top">
		<div class="container d-lg-flex">
		<!-- logo -->
			<h1 class="logo-style-res float-left">
				<a class="navbar-brand" href="index.html">
					<img src="{{asset('images/logo.png')}}" alt="" class="img-fluid logo-img">HOCVUI <span>The Best Edu</span>
				</a>
			</h1>

		<!-- nav -->
			<div class="nav_w3ls mx-lg-auto">
				<nav>
					<label for="drop" class="toggle">Menu</label>
					<input type="checkbox" id="drop" />
					<ul class="menu mx-lg-auto">
						<li><a href="#" class="active">Trang chủ</a></li>
						<li><a href="#gallery">Đọc sách</a></li>
						<li>
							<label for="drop-2" class="toggle toogle-2">Học Phần<span class="fa fa-angle-down" aria-hidden="true"></span></label>
							<a href="#">Học Phần<span class="fa fa-angle-down" aria-hidden="true"></span></a>
							<input type="checkbox" id="drop-2" />
							<ul>
								<li><a href="#services" class="drop-text">Tiếng Anh tiểu học</a></li>
								<li><a href="#professors" class="drop-text">Tiếng Anh trung học</a></li>
								<li><a href="#blog" class="drop-text">Tiếng Anh phổ thông</a></li>
								<li><a href="#who" class="drop-text">Tiếng Anh thiếu nhi</a></li>
							</ul>
						</li>
						<li>
							<label for="drop-2" class="toggle toogle-2">Lịch sử<span class="fa fa-angle-down" aria-hidden="true"></span></label>
							<a href="#">Lịch sử<span class="fa fa-angle-down" aria-hidden="true"></span></a>
							<input type="checkbox" id="drop-2" />
							<ul>
								<li><a href="#services" class="drop-text">Lịch sử học phần</a></li>
								<li><a href="#professors" class="drop-text">Lịch sử đọc sách</a></li>
								<li><a href="#blog" class="drop-text">Lịch sử góp ý</a></li>
							</ul>
						</li>
						<li><a href="#about">Liên hệ</a></li>
						<li><a href="#contact">Góp ý</a></li>
					</ul>
				</nav>
			</div>
	</div>

<!-- banner -->
	<div class="banner_w3lspvt">
		<div class="csslider infinity" id="slider1">
			<input type="radio" name="slides" checked="checked" id="slides_1" />
			<input type="radio" name="slides" id="slides_2" />
			<ul class="banner banner1">
				<li class="banner-top1">
					<div class="container">
						<div class="banner-info_w3ls">
						</div>
					</div>
				</li>
				<li class="banner banner2">
					<div class="container">
						<div class="banner-info_w3ls">
							<h5 class="text-li">Your Education, Your Way! </h5>
							<h3 class="text-wh font-weight-bold mt-2 mb-5">Best Online <br>Learning System </h3>
							<p> Get started with online education </p>
						</div>
					</div>
				</li>
			</ul>
			<div class="navigation">
				<div>
					<label for="slides_1"></label>
					<label for="slides_2"></label>
				</div>
			</div>
		</div>
	</div>

<!-- banner bottom grids -->
	<section class="about-bottom" id="services">
		<div class="container pb-lg-4">
			<div class="row text-center">
				<div class="col-md-4 service-subgrids bg-vi">
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<a href=""><h4 class="text-wh font-weight-bold mb-3">Tiếng Anh thiếu nhi</h4></a>
						<p class="text-li"> Tiếng Anh dành cho thiếu nhi </p>
					</div>
					<span class="fa fa-users" aria-hidden="true"></span>
				</div>

				<div class="col-md-4 service-subgrids bg-wi">
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<a href=""><h4 class="text-bl font-weight-bold mb-3">Tiếng Anh tiểu học</h4></a>
						<p class="text-secondary">Tiếng Anh dành cho thiếu nhi học sinh tiểu học</p>
					</div>
					<span class="fa fa-linode" aria-hidden="true"></span>
				</div>
				<div class="col-md-4 service-subgrids bg-vi">
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<a href=""><h4 class="text-wh font-weight-bold mb-3">Tiếng Anh trung học</h4></a>
						<p class="text-li"> Tiếng Anh dành cho thiếu nhi học sinh trung học</p>
					</div>
					<span class="fa fa-book" aria-hidden="true"></span>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-md-4 service-subgrids bg-wi">
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<a href=""><h4 class="text-bl font-weight-bold mb-3">Tiếng Anh phổ thông</h4></a>
						<p class="text-secondary"> Tiếng Anh dành cho thiếu nhi học sinh trung học phổ thông </p>
					</div>
					<span class="fa fa-laptop" aria-hidden="true"></span>
				</div>
				<div class="col-md-4 service-subgrids bg-vi">
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<a href=""><h4 class="text-wh font-weight-bold mb-3">Tiếng Anh B1</h4></a>
						<p class="text-li"> Tiếng Anh dành cho sinh viên ôn tập B1 </p>
					</div>
					<span class="fa fa-thumbs-o-up" aria-hidden="true"></span>
				</div>
				<div class="col-md-4 service-subgrids bg-wi">
					<div class="w3ls-about-grid py-lg-5 py-md-4 py-5 px-3">
						<a href=""><h4 class="text-bl font-weight-bold mb-3">Đọc sách</h4></a>
						<p class="text-secondary">Tuyển tập những cuốn sách hay</p>
					</div>
					<span class="fa fa-magic" aria-hidden="true"></span>
				</div>
			</div>
		</div>
	</section>

<!-- book -->
	<section class="blog py-5" id="blog">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="text-bl text-center font-weight-bold mb-2">Sách mới nhất</h3>
			<h6 class="text-colors text-center let-spa mb-5">Something More</h6>
			<div class="row">
				<!-- blog grid -->
				<div class="col-lg-3 col-md-6 px-2 mt-sm-0 mt-4">
					<div class="card">
						<div class="card-header p-0 position-relative">
							<a href="#">
								<img class="card-img-bottom" src="images/books/neuchiconmotngaydesong.jpg" alt="Card image cap">
							</a>
						</div>
						<!--- sách 1 --->
						<div class="card-body">
							<h6 class="text-colors let-spa mb-3">05 November 2018</h6>
							<h5 class="blog-title card-title font-weight-bold">
								<a href="#" class="text-bl">Nếu chỉ còn một ngày để sống</a>
							</h5>
							<div class="row mt-5">
								<div class="col-9 w3_testi_grid mt-xl-2 mt-lg-0 mt-md-2 mt-4">
									<h5 class="text-colors mb-1">Adam Ster</h5>
									<p>Sed do eiusmod</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-3 col-md-6 px-2 mt-md-0 mt-4">
					<div class="card">
						<div class="card-header p-0 position-relative">
							<a href="#">
								<img class="card-img-bottom" src="images/books/vithuong.jpg" alt="Card image cap">
							</a>
						</div>
						<!--- sách 2 --->
						<div class="card-body">
							<h6 class="text-colors let-spa mb-3">08 November 2018</h6>
							<h5 class="blog-title card-title font-weight-bold">
								<a href="#" class="text-bl">Vì thương</a>
							</h5>
							<div class="row mt-5">
								<div class="col-9 w3_testi_grid mt-xl-2 mt-lg-0 mt-md-2 mt-4">
									<h5 class="text-colors mb-1">Anna Mull</h5>
									<p>Sed do eiusmod</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-3 col-md-6 px-2 mt-md-0 mt-4">
					<div class="card">
						<div class="card-header p-0 position-relative">
							<a href="#">
								<img class="card-img-bottom" src="images/books/vithuong.jpg" alt="Card image cap">
							</a>
						</div>
						<!--- sách 2 --->
						<div class="card-body">
							<h6 class="text-colors let-spa mb-3">08 November 2018</h6>
							<h5 class="blog-title card-title font-weight-bold">
								<a href="#" class="text-bl">Vì thương</a>
							</h5>
							<div class="row mt-5">
								<div class="col-9 w3_testi_grid mt-xl-2 mt-lg-0 mt-md-2 mt-4">
									<h5 class="text-colors mb-1">Anna Mull</h5>
									<p>Sed do eiusmod</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //blog grid -->
				<!-- blog grid -->
				<div class="col-lg-3 col-md-6 px-2 mt-lg-0 mt-4">
					<div class="card">
						<div class="card-header p-0 position-relative">
							<a href="#">
								<img class="card-img-bottom" src="images/books/tungcanhtudo.jpg" alt="Card image cap">
							</a>
						</div>
						<div class="card-body">
							<h6 class="text-colors let-spa mb-3">10 November 2018</h6>
							<h5 class="blog-title card-title font-weight-bold">
								<a href="#" class="text-bl">Tung cánh tự do</a>
							</h5>
							<div class="row mt-5">
								<div class="col-9 w3_testi_grid mt-xl-2 mt-lg-0 mt-md-2 mt-4">
									<h5 class="text-colors mb-1">Petey Cruiser</h5>
									<p>Sed do eiusmod</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //blog -->

<!-- brands -->
	<section class="brands">
		<div class="container-fluid">
			<div class="row text-center">
				<div class="col-3 main-brand bg-grey">
					<span class="fa fa-headphones mb-3" aria-hidden="true"></span>
					<h5>Listen</h5>
				</div>
				<div class=" col-3 main-brand bg-black">
					<span class="fa fa-volume-up mb-3" aria-hidden="true"></span>
					<h5>Speak</h5>
				</div>
				<div class="col-3 main-brand bg-dark2">
					<span class="fa fa-book mb-3" aria-hidden="true"></span>
					<h5>Read</h5>
				</div>
				<div class=" col-3 main-brand bg-grey">
					<span class="fa fa-pencil mb-3" aria-hidden="true"></span>
					<h5>Write</h5>
				</div>
			</div>
		</div>
	</section>
	<!-- //brands -->

<!-- footer -->
	<footer class=" py-1">
		<div class="container py-xl-4">
			<div class="row footer-grids">
				<div class="col-lg-2 col-sm-4 footer-grid">
					<h3 class="mb-sm-4 mb-3 pb-lg-3">Home</h3>
					<ul class="list-unstyled">
						<li>
							<a href="index.html">Đọc sách</a>
						</li>
						<li class="my-2">
							<a class="scroll" href="#hp">Học phần</a>
						</li>
						<li>
							<a class="scroll" href="#ls">Lịch sử</a>
						</li>
						<li class="my-2">
							<a class="scroll" href="#gallery">Liên hệ</a>
						</li>
						<li>
							<a class="scroll" href="#contact">Góp ý</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-2 col-sm-4 footer-grid mt-sm-0 mt-4">
					<h3 class="mb-sm-4 mb-3 pb-lg-3"> Skill</h3>
					<ul class="list-unstyled">
						<li>
							<a class="scroll" href="#who">Listen</a>
						</li>
						<li class="my-2">
							<a class="scroll" href="#blog">Speak</a>
						</li>
						<li>
							<a class="scroll" href="#professors">Read</a>
						</li>
						<li class="my-2">
							<a class="scroll" href="#blog">Write</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-5 col-sm-4 footer-grid mt-lg-0 mt-4">
					<div class="address">
						<div class="row address-grid">
							<div class="col-md-3 col-sm-4 col-2 address-left text-center">
								<i class="fa fa-phone"></i>
							</div>
							<div class="col-md-9 col-sm-8 col-10 address-right">
								<p>+84 329 266 200</p>
							</div>
						</div>
						<div class="row address-grid my-3">
							<div class="col-md-3 col-sm-4 col-2 address-left text-center">
								<i class="fa fa-envelope"></i>
							</div>
							<div class="col-md-9 col-sm-8 col-10 address-right">
								<p>
									<a href="mailto:example@email.com"> ngocanh2822@gmail.com</a>
								</p>
								<p>
									<a href="mailto:example@email.com"> ngocanh.13nh@gmail.com</a>
								</p>
							</div>
						</div>
						<div class="row address-grid">
							<div class="col-md-3 col-sm-4 col-2 address-left text-center">
								<i class="fa fa-map-marker"></i>
							</div>
							<div class="col-md-9 col-sm-8 col-10 address-right">
								<p> 457 Lê Duẩn,Buôn Ma Thuột <br> Đăk Lăk, Việt Nam</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-4 footer-grid footer-contact mt-lg-0 mt-4">
					<h3 class="mb-sm-4 mb-3 pb-lg-3"> About us</h3>
					<ul class="list-unstyled">
						<li class="mr-1 soci-effe facebook">
							<a href="https://www.facebook.com/">
							<i class="fa fa-facebook-f"> </i>facebook
							</a>
						</li>
						<li class="mr-1 soci-effe twitter">
							<a href="#">
							<i class="fa fa-twitter"> </i>Twitter
							</a>
						</li>
						<li class="mr-1 soci-effe google-plus">
							<a href="#">
							<i class="fa fa-google-plus"> </i>Google+
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copyright-w3ls py-4">
		<div class="container">
			<div class="row">
				<!-- copyright -->
				<p class="col-lg-8 copy-right-grids text-bl text-lg-left text-center mt-lg-2">© 2020 Studies. All
					Rights Reserved | Design by
					<a href="https://www.facebook.com/ngocanh2822" target="_blank" class="text-colors">ngocanh2822</a>
				</p>
				<!-- //copyright -->
			</div>
		</div>
	</div>
	<!-- //copyright -->
	<!-- move top icon -->
	<a href="#home" class="move-top text-center"></a>
	<!-- //move top icon -->

</body>
</html>