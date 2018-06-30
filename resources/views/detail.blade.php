@extends('layout')
@section('content')
<div class="main-container no-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 main-content">
				<div class="single-product">
					<div class="row">
						<div class="col-sm-6 col-md-5 col-lg-5">
							<div class="images kt-images">
								<div class="kt-main-image">
									<a class="zoom" href="{{Voyager::image($product->image)}}"><img src="{{Voyager::image($product->image)}}" alt=""></a>
								</div>
								<div class="kt-thumbs">
									<div class="owl-carousel" data-items="1" data-nav="true" data-animateout="slideInUp" data-animatein="slideInUp">
										@if($product->im && isset($product->im))
										<div class="page-thumb">
											@foreach(json_decode($product->im) as $key => $value)
												<a class="item-thumb" href="{{Voyager::image($value)}}"><img src="{{Voyager::image($value)}}" alt=""></a>
											@endforeach
										</div>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-7 col-lg-7">
							<div class="summary">
								<h1 class="product_title entry-title">{{ $product->title }}</h1>
								<span class="price">{{ number_format($product->price) }} VNĐ</span>
								<div class="short-descript">
									<p><strong>Sơ Lược:</strong> {{ $product->excerpt}}</p>
								</div>
							</div>
						</div>
					</div>

					<div class="product-tabs">
						<ul class="nav-tab">
				            <li class="active"><a data-toggle="tab" href="#tab-1">Chi tiết sản phẩm</a></li>
				        </ul>
				        <div class="tab-container">
				        	<div id="tab-1" class="tab-panel active">
				        		<p>Mauris eu euismod tellus curabitur a neque in nulla iaculis facilisis. Proin sit amet semper justo, eget lacinia nulla. Nullam ante purusauctor in felis.Cras rutrum vel tortor et euismod. Curabitur nulla ante, vehicula ut bibendum ut, varius non mi. Nullam luctus ultrices elit, eu consectetur enim suscipit eget.</p>

								<p>Dimensions:<br>
								Height: 13cm x Length: 15cm</p>

								<p>Materials & finishes<br>
								Handmade in beechwood</p>
				        	</div>
				        </div>
					</div>
				</div>
				<div class="related products">	
					<div class="heading-section text-center">
						<h3 class="title">SẢN PHẨM KHÁC</h3>
					</div>
					<ul class="owl-carousel nav-center nav-style-1" data-loop="true" data-nav="true" data-dots="false" data-margin="10" data-responsive='{"0":{"items":"1"},"768":{"items":"3"},"992":{"items":"4"}}'>
						@foreach($random as $key => $value)
						<?php
							$cate_post = DB::table('categories')->where('id',$value->category_id)->first();
						?>
						<li class="product-item">
							<div class="product-inner">
								<div class="thumb has-second-image">
									<a href="{{ URL::to('chi-tiet')}}/{{$cate_post->slug}}/{{ $value->slug }}">
										<img src="{{Voyager::image($value->image)}}" alt="">
									</a>
								</div>
								<div class="info">
									<h3 class="product-name short"><a href="{{ URL::to('chi-tiet')}}/{{$cate_post->slug}}/{{ $value->slug }}">{{ $value->title }}</a></h3>
									<span class="price">{{ number_format($value->price) }} VNĐ</span>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div> 
			</div>
		</div>
	</div>
</div>
@stop