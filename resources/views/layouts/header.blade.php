
<!-- header -->
	<header id="home">
	<!-- top-bar -->
		<div class="top-bar py-2 bg-m5">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-5 top-social-w3pvt-am mt-lg-1 mb-md-0 mb-1 text-lg-left text-center">
						<div class="row">
							<div class="col-xl-4 col-6 header-top_w3layouts border-right text-center">
								<p class="text-bl">
									<a href="dangnhap">Đăng nhập</a>
								</p>
							</div>
							<div class="col-xl-4 col-6 header-top_w3layouts text-center">
								<p class="text-bl">
									<a href="dangky">Đăng ký</a>
								</p>
							</div>
							<div class="col-xl-4"></div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-7 top-social-w3pvt-am mt-lg-0 mt-2 text-center">
						<div class="row">
							<div class="col-6 top-w3layouts">
							</div>
							<div class="col-6  mt-lg-1 socila-brek text-md-right text-center">
								<!-- social icons -->
								<ul class="top-right-info">
									<li>
										<p class="par-so mr-3">Login with:</p>
									</li>
									<li class="mr-1 soci-effe facebook">
										<a href="https://www.facebook.com/">
											<span class="fa fa-facebook-f"></span>
										</a>
									</li>
									<li class="mr-1 soci-effe google-plus">
										<a href="https://accounts.google.com/ServiceLogin">
											<span class="fa fa-google-plus"></span>
										</a>
									</li>
								</ul>
								<!-- //social icons -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
<!-- //top-bar -->

<!-- header 2 -->
	<!-- navigation -->
	<div class="main-top">
		<div class="container d-lg-flex">
<!-- logo -->
			<h1 class="logo-style-res float-left">
				<a class="navbar-brand" href="index">
					<img src="images/logo.png" alt="" class="img-fluid logo-img">VUIHOC <span>The Best Edu</span>
				</a>
			</h1>
<!-- //logo -->
<!-- nav -->
			<div class="nav_w3ls mx-lg-auto">
				<nav>
					<label for="drop" class="toggle3" id="toggle3">Menu</label>
					<input type="checkbox" id="drop" />
					<ul class="menu mx-lg-auto">
						<li><a href="index" class="active">Trang chủ</a></li>
						<li><a href="#hocphan">Đọc sách</a></li>
						<li>
							<!-- First Tier Drop Down -->
							<label for="drop-2" class="toggle toogle-2">Học Phần <span class="fa fa-angle-down" aria-hidden="true"></span>
							</label>
							<a href="#">Học Phần<span class="fa fa-angle-down" aria-hidden="true"></span></a>
							<input type="checkbox" id="drop-2" />
							<ul>
					@foreach($monhoc ?? '' as $row)
								<li><a href="{{ $row->mamonhoc.'?mamonhoc='.$row->mamonhoc }}" class="drop-text">{{ $row->ten }}</a></li>
					@endforeach
							</ul>
						</li>
						<li>
							<a href="lichsu">Lịch sử</a>
						</li>
						<li><a href="gopy">Góp Ý</a></li>
						<li><a href="lienhe">Liên Hệ</a></li>
					</ul>
				</nav>
			</div>

<!-- //nav -->
		</div>
	</div>
<!-- //navigation -->
<!-- //header 2 -->