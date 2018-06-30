
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>LuckyShop - Online Super Market! </title>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/owl.carousel.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/chosen.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/flaticon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/magnific-popup.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/jquery.mCustomScrollbar.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/easyzoom.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/Pe-icon-7-stroke.css')}}">
	<link href='https://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,300italic,300,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/color.css')}}">
</head>
<body class="home">
<div id="box-mobile-menu" class="full-height full-width box-mobile-menu">
	<div class="box-inner">
		<a href="#" class="close-menu"><span class="icon fa fa-times"></span></a>
	</div>
</div>
<div id="header-ontop" class="is-sticky"></div>
	<!-- Header -->
	<div id="header" class="header">
		<div class="top-bar">
			<div class="container">
				<div class="top-bar-left top-bar-center">
				<div class="logo">	
						<a href="#"><img src="{{Voyager::image('logo.png')}}" alt=""></a>
					</div>
				</div>
				
			</div>
		</div>
		<div class="main-header">
			<div class="container">
				<div class="main-menu-wapper">
					<a class="mobile-navigation" href="#">
						<span class="icon">
							<span></span>
							<span></span>
							<span></span>
						</span>
						Main Menu
					</a>
					<ul class="kt-nav main-menu clone-main-menu">
							<li class="menu-item-has-children">
								<a href="{{ URL::to('/')}}">Trang Chủ</a>
							</li>
							@foreach( $menuhomes as $key => $value)
							<?php
								$checkMenuParent = false;
								$menus= DB::table('categories')->where('id',$value->category_id)->first();
								$category = DB::table('categories')->get();
								foreach ($category as $key => $value) {
									if($menus->id == $value->parent_id) {
										$checkMenuParent = true;
										$menuParents= DB::table('categories')->where('parent_id',$menus->id)->get();
									}
								}
							?>
							<li class="menu-item-has-children">
								<a href="{{ URL::to('')}}/{{ $menus->slug }}">{{ $menus->name }}</a>
									@if($checkMenuParent == true )
									<ul class="sub-menu">
									
										@foreach( $menuParents as $key => $values)
											<li class="menu-item-has-children">
												<a href="{{ URL::to('/')}}/{{$menus->slug}}/{{$values->slug}}/{{$values->id}}">{{ $values->name }}</a>
												<!-- <ul class="sub-menu">
													<li><a href="category-grid-fullwidth.html">Shop Grid Fullwidth</a></li>
													<li><a href="category-grid-leftsidebar.html">Shop Grid Left Sidebar</a></li>
													<li><a href="category-grid-rightsidebar.html">Shop Grid Right Sidebar</a></li>
													<li><a href="category-slider.html">Shop Grid With Slider</a></li>
													<li><a href="category-list-fullwidth.html">Shop List Fullwidth</a></li>
													<li><a href="category-list-leftsidebar.html">Shop List Left Sidebar</a></li>
													<li><a href="category-list-rightsidebar.html">Shop List Right Sidebar</a></li>
												</ul> -->
											</li>
										@endforeach
									</ul>
									@endif								
							</li>
							@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- ./Header -->
	@yield('content')
	<!-- Footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="widget">
						<h3 class="widget-title">Liên Hệ</h3>
						<ul>
							<li>Địa chỉ : 42/1 Ung Văn Khiêm, phường 25, quận Bình Thạnh, TP Hồ Chí Minh </li>
							<li>SĐT: 086 889 1253</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<div class="coppyright">Copyright © 2018 by <a href="witayl.com">Witayl</a>. All Rights Reserved.</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="payment">
							<span><img src="images/payments/1.png" alt=""></span>
							<span><img src="images/payments/2.png" alt=""></span>
							<span><img src="images/payments/3.png" alt=""></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- ./Footer -->
	<a href="#" class="scroll_top" title="Scroll to Top"><i class="fa fa-arrow-up"></i></a>
		<script type="text/javascript" src="{{ URL::to('js/jquery-2.1.4.min.js')}}"></script>
		<script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{ URL::to('js/owl.carousel.min.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/chosen.jquery.min.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/Modernizr.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/jquery-ui.min.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/jquery.parallax-1.1.3.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/jquery.plugin.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/jquery.countdown.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/jquery.magnific-popup.min.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/wow.min.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/jquery.bxslider.min.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/jquery.actual.min.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/masonry.pkgd.min.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/imagesloaded.pkgd.min.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/isotope.pkgd.min.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/easyzoom.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/jquery.hoverdir.js')}}"></script>
	    <script type="text/javascript" src="{{ URL::to('js/masonry.js')}}"></script>
		<script type="text/javascript" src="{{ URL::to('js/functions.js')}}"></script>
</body>
</html>