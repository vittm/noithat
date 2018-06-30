@extends('layout')
@section('content')
@if(isset($banner->images) > 0 )
<div class="page-banner bg-parallax" style="background: url('{{Voyager::image($banner->images)}}')"></div>
@endif
<div class="main-container left-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-9 main-content">
				<div class="shop-page-bar">
					<div class="page-bar-right">
						<form class="woocommerce-ordering">
							<select name="orderby" class="orderby" style="display: none;">
								<option value="menu_order" selected="selected">Mặc Định</option>
								<option value="price">Giá từ thấp tới cao</option>
								<option value="price-desc">Giá từ cao tới thấp</option>
							</select>
						</form>
					</div>
				</div>
				<ul class="products product-list-grid desktop-columns-3 tablet-columns-2 mobile-columns-1">
				@foreach($product as $key => $value)
				
					<li class="product-item col-md-4 col-sm-6 col-xs-12">
						<div class="product-inner">
							<div class="thumb has-second-image">
							<?php
								$cate_post = DB::table('categories')->where('id',$value->category_id)->first();
							?>
								<a href="{{ URL::to('chi-tiet')}}/{{$cate_post->slug}}/{{ $value->slug }}">
									<img src="{{Voyager::image($value->image)}}" alt="">
									<img class="second-image" src="{{Voyager::image($value->image)}}" alt="">
								</a>
								<div class="flash">
									<span class="new">New</span>
								</div>
							</div>
							<div class="info">
								<h3 class="product-name short"><a href="{{ URL::to('chi-tiet')}}/{{$cate_post->slug}}/{{ $value->slug }}">{{ $value->title }}</a></h3>
								<span class="price">{{ number_format($value->price) }} VNĐ</span>
							</div>
						</div>
					</li>
				@endforeach
				</ul>
				<nav class="woocommerce-pagination navigation">
					<ul class="page-numbers">
						<li><span class="page-numbers current">1</span></li>
						<li><a class="page-numbers" href="#">2</a></li>
						<li><a class="page-numbers" href="#">3</a></li>
						<li><a class="next page-numbers" href="#"><i class="fa fa-long-arrow-right"></i></a></li>
					</ul>
				</nav>
			</div>
			<div class="col-sm-4 col-md-3 sidebar">
				<div class="widget widget_product_categories">
					<h2 class="widget-title">{{ $banner->name }}</h2>
					<ul class="product-categories">
					@foreach($category as $key => $value)
						<li><a href="{{ URL::to('/san-pham')}}/{{$value->slug}}/{{$value->id}}">{{ $value->name }}</a></li>
					@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
		
@stop