<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>VUIHOC</title>
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
<!--// Meta tag Keywords -->

<!-- Custom-Files -->
<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<!-- banner slider -->
	<link href="{{asset('css/slider.css')}}" type="text/css" rel="stylesheet" media="all">
<!-- Style-CSS -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
<!-- Font-Awesome-Icons-CSS -->
	<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
<!-- //Custom-Files -->

<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=latin-ext"
	 rel="stylesheet">
<!-- //Web-Fonts -->
<script type="text/javascript" src="{{asset('jquery/hiddenimg.js')}}"></script>
</head>

<body>


 	@include('layouts.header')
 	@yield('content')
 	@include('layouts.footer')



</body>

</html>