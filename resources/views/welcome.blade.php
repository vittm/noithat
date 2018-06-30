@extends('layout')
@section('content')
<!-- Slide show -->
<div class="slide-home1">
		<div class="slide-container">
			@foreach($slides as $key => $value)
				<img src="{{Voyager::image($value->images)}}" alt="">
			@endforeach
		</div>
		<div class="thumbs">
			@foreach($slides as $key => $value)
				<a data-slide-index="{{$key}}" href=""><img src="{{Voyager::image($value->images)}}" alt="" /></a>
			@endforeach
		</div>
	</div>
	<!-- ./Slide show -->
	<!-- Section SPECIAL LOOK!-->
	<div class="heading-section text-center margin-top-90 wow fadeInRight">
		<h3 class="title">SẢN PHẨM ĐẶC BIỆT</h3>
	</div>
	<div class="container wow fadeIn">
		<div class="row margin-0">
		@foreach($specials->chunk(3,0) as $key => $value)
			<?php
				$special1 = DB::table('posts')->where('id',$value['0']->post_id)->first();
				$special2 = DB::table('posts')->where('id',$value['1']->post_id)->first();
				$special3 = DB::table('posts')->where('id',$value['2']->post_id)->first();
			?>
			<div class="col-sm-5 col-md-4 padding-0">
				<div class="kt-banner block-banner-text style2" data-height="595" data-background="{{Voyager::image($special1->image)}}" data-positionleft="0px" data-positionright="0px" data-positionbottom="100px">
					<a href="#" class="bg-image"></a>
					<div class="content text-center">
						<h3 class="title">{{ $special1 -> title }}</h3>
						<h4 class="subtitle">{{ $special1 -> excerpt }}</h4>
						<span class="flash">SALE</span>
					</div>
				</div>
			</div>
			<div class="col-sm-7 col-md-8 padding-0">
				<div class="kt-banner block-banner-text style2 right" data-height="328" data-background="{{Voyager::image($special2->image)}}" data-positionleft="50%" data-verticalmiddle="middle">
					<a href="#" class="bg-image"></a>
					<div class="content">
						<span class="flash" style="background-color: #ff9081;">HOT</span>
						<h3 class="title">{{ $special2 -> title }}</h3>
						<h4 class="subtitle">{{ $special2 -> excerpt }}</h4>
					</div>
				</div>
				<div class="kt-banner block-banner-text style2 left" data-height="267" data-background="{{Voyager::image($special3->image)}}" data-positionright="50%" data-verticalmiddle="middle">
					<a href="#" class="bg-image"></a>
					<div class="content text-right">
						<h3 class="title">{{ $special3 -> title }}</h3>
						<h4 class="subtitle">{{ $special3 -> excerpt }}</h4>
						<span class="flash" style="background-color: #83ccd5;">New</span>
					</div>
				</div>
			</div>
		@endforeach
		</div>
	</div>
	<!-- ./Section SPECIAL LOOK!-->
	<!-- promotions -->
	<div class="margin-top-60">
		<div class="container">
			<div class="row margin-0">
				@foreach($categories as $key => $value)
				<div class="col-sm-12 col-md-6 padding-0 wow fadeInLeft">
					<div class="kt-banner block-banner-text margin-bottom-30" data-height="214" data-background="{{Voyager::image($value->images)}}" data-positionleft="30px" data-verticalmiddle="middle">
						<a href="#" class="bg-image">Banner Bg</a>
						<div class="content">
							<h3 class="title">Sản Phẩm</h3>
							<h4 class="subtitle">{{ $value -> name }}</h4>
							<a class="link-more" href="#"><i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- ./promotions -->
	<!-- List product -->
	<div class="heading-section text-center margin-top-90 wow fadeInLeft">
		<h3 class="title">SẢN PHẨM CỦA CHÚNG TÔI</h3>
	</div>
	<div class="section-our-product wow fadeInUp">
		<div class="container">
			<ul class="products product-list-grid desktop-columns-4 tablet-columns-3 mobile-columns-1 owl-carousel-mobile" data-nav="false" data-dots="false" data-items="1">
				@foreach($products as $key => $value)
					<li class="product-item style2 col-md-3 col-sm-4 col-xs-12 item-owl-mobile">
						<div class="product-inner">
							<div class="thumb has-second-image">
								<a href="#">
									<img src="{{Voyager::image($value->image)}}" alt="">
									<img class="second-image" src="{{Voyager::image($value->image)}}" alt="">
								</a>
								<div class="flash">
									<span class="new">Mới</span>
								</div>
							</div>
							<div class="info">
								<h3 class="product-name short"><a href="#">{{ $value->title }}</a></h3>
								<span class="price">$75.00</span>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- ./List product -->

	<!-- Section Services -->
	<div class="section-services bg-parallax">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<div class="box-icon margin-bottom-80 wow zoomInUp">
						<div class="icon">
							<span class="icon-font flaticon-label36"></span>
						</div>
						<div class="box-content">
							<h3 class="title">Đổi Trả</h3>
							<span class="subtitle">Đổi trả hàng trong vòng 7 ngày</span>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="box-icon margin-bottom-80 wow zoomInUp">
						<div class="icon">
							<span class="icon-font flaticon-mappoint6"></span>
						</div>
						<div class="box-content">
							<h3 class="title">Chuyển Hàng Hoá</h3>
							<span class="subtitle">Miễn phí cho đơn hàng trên 200</span>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="box-icon margin-bottom-80 wow zoomInUp">
						<div class="icon">
							<span class="icon-font flaticon-speech102"></span>
						</div>
						<div class="box-content">
							<h3 class="title">Hỗ Trợ</h3>
							<span class="subtitle">Chúng tôi hỗ trợ bạn mọi lúc.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ./Section Services -->
	<div class="row margin-0">
		<div class="col-sm-6 padding-0">
			<div class="block-social" style="background: url('{{Voyager::image('banner_left.jpg')}}')">
				<div class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
			</div>
		</div>
		<div class="col-sm-6 padding-0">
			<div class="block-newsletter" style="background: url('{{Voyager::image('banner_right.jpg')}}')">
				<div class="inner">
					<h2 class="title">Cập nhập tinh tức</h2>
					<p class="subtitle">Đăng ký để nhận nhiều ưu đãi</p>
					<form>
						<input type="text" placeholder="Điền vào Email của bạn" class="text-input">
						<button class="button"><i class="fa fa-envelope-o"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection