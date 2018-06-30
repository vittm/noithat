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
									<a class="zoom" href="images/products/17.jpg"><img src="images/products/13.jpg" alt=""></a>
								</div>
								<div class="kt-thumbs">
									<div class="owl-carousel" data-items="1" data-nav="true" data-animateout="slideInUp" data-animatein="slideInUp">
										<div class="page-thumb">
										@if($product-im && count($product->im) > 0)
											@foreach(json_decode($product->img)
											<a class="item-thumb zoom" href="#"><img src="images/products/14.jpg" alt=""></a>
											@endforeach
										</div>
										<div class="page-thumb">
											<a class="item-thumb zoom" href="images/products/21.jpg"><img src="images/products/14.jpg" alt=""></a>
											
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
				            <li class="active"><a data-toggle="tab" href="#tab-1">Product Descriptions</a></li>
				            <li><a data-toggle="tab" href="#tab-2">Product Tags</a></li>
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
						<h3 class="title">UPSELL Products</h3>
					</div>
					<ul class="owl-carousel nav-center nav-style-1" data-loop="true" data-nav="true" data-dots="false" data-margin="10" data-responsive='{"0":{"items":"1"},"768":{"items":"3"},"992":{"items":"4"}}'>
						<li class="product-item">
							<div class="product-inner">
								<div class="thumb has-second-image">
									<a href="#">
										<img src="images/products/1.jpg" alt="">
										<img class="second-image" src="images/products/2.jpg" alt="">
									</a>
									<div class="group-button">
										<a class="wishlist" href="#">Wishlist</a>
										<a class="button add_to_cart_button" href="#">Add to cart</a>
										<a class="compare button" href="#">Compare</a>
									</div>
									<div class="flash">
										<span class="new">New</span>
									</div>
									<a href="#" title="Quick View" class="button quick-view yith-wcqv-button">Quick View</a>
								</div>
								<div class="info">
									<h3 class="product-name short"><a href="#">Stockholm Chair high Mosta gruancy</a></h3>
									<span class="price">$75.00</span>
								</div>
							</div>
						</li>
						<li class="product-item">
							<div class="product-inner">
								<div class="thumb has-second-image">
									<a href="#">
										<img src="images/products/2.jpg" alt="">
										<img class="second-image" src="images/products/3.jpg" alt="">
									</a>
									<div class="group-button">
										<a class="wishlist" href="#">Wishlist</a>
										<a class="button add_to_cart_button" href="#">Add to cart</a>
										<a class="compare button" href="#">Compare</a>
									</div>
									<div class="flash">
										<span class="new">New</span>
									</div>
									<a href="#" title="Quick View" class="button quick-view yith-wcqv-button">Quick View</a>
								</div>
								<div class="info">
									<h3 class="product-name short"><a href="#">Stockholm Chair high Mosta gruancy</a></h3>
									<span class="price">$75.00</span>
								</div>
							</div>
						</li>
						<li class="product-item">
							<div class="product-inner">
								<div class="thumb has-second-image">
									<a href="#">
										<img src="images/products/3.jpg" alt="">
										<img class="second-image" src="images/products/4.jpg" alt="">
									</a>
									<div class="group-button">
										<a class="wishlist" href="#">Wishlist</a>
										<a class="button add_to_cart_button" href="#">Add to cart</a>
										<a class="compare button" href="#">Compare</a>
									</div>
									<div class="flash">
										<span class="new">New</span>
									</div>
									<a href="#" title="Quick View" class="button quick-view yith-wcqv-button">Quick View</a>
								</div>
								<div class="info">
									<h3 class="product-name short"><a href="#">Stockholm Chair high Mosta gruancy</a></h3>
									<span class="price">$75.00</span>
								</div>
							</div>
						</li>
						<li class="product-item">
							<div class="product-inner">
								<div class="thumb has-second-image">
									<a href="#">
										<img src="images/products/4.jpg" alt="">
										<img class="second-image" src="images/products/5.jpg" alt="">
									</a>
									<div class="group-button">
										<a class="wishlist" href="#">Wishlist</a>
										<a class="button add_to_cart_button" href="#">Add to cart</a>
										<a class="compare button" href="#">Compare</a>
									</div>
									<div class="flash">
										<span class="new">New</span>
									</div>
									<a href="#" title="Quick View" class="button quick-view yith-wcqv-button">Quick View</a>
								</div>
								<div class="info">
									<h3 class="product-name short"><a href="#">Stockholm Chair high Mosta gruancy</a></h3>
									<span class="price">$75.00</span>
								</div>
							</div>
						</li>
					</ul>
				</div> 
			</div>
		</div>
	</div>
</div>
		<div class="row margin-0">
			<div class="col-sm-6 padding-0">
				<div class="block-social">
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
				<div class="block-newsletter">
					<div class="inner">
						<h2 class="title">Join Our Newsletter</h2>
						<p class="subtitle">Sign up our newsletter and get more events & promotions!</p>
						<form>
							<input type="text" placeholder="Enter your email here" class="text-input">
							<button class="button"><i class="fa fa-envelope-o"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
@stop