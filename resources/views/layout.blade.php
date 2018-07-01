
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	@yield('title')
	<meta property="fb:app_id" content="233253610499667" />
	@yield('facebook_meta')
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500&amp;amp;subset=vietnamese"/>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/style.css')}}">
	<script type="text/javascript" src="{{ URL::to('js/jquery-3.2.1.min.js')}}"></script>
</head>
<body>
	<!-- Header -->
	<div class="header-logo">
		<div class="container">
			<div class="header-logo__social-icon">
				<a href="http://www.facebook.com/" target="_self">
					<img src="{{Voyager::image('facebook.png')}}" alt="" width="16"/>
				</a>
				<a href="https://www.instagram.com/" target="_self">
					<img src="{{Voyager::image('instagram.png')}}" alt="" width="16"/>
				</a>
				<a href="https://www.youtube.com/" target="_self">
					<img src="{{Voyager::image('youtube.png')}}" alt="" width="16"/>
				</a>
			</div>
		</div>
		<div class="header-logo__images">
			<a href="http://www.facebook.com/" target="_self">
				<img src="{{Voyager::image('logo.png')}}" alt=""/>
			</a>
		</div>
	</div>
	<div class="container">
		<ul class="header-menu flex">
			<li class="header-menu__item">
				<a href="{{ URL::to('/')}}"class="header-menu__item__name">Trang Chủ</a>
			</li>
			@foreach($menuhomes as $key => $value)
				<?php
					$submenu = DB::table('categories')->where('parent_id','=',$value->id)->get();
				?>
				<li class="header-menu__item @if($value->slug == 'phong-cach') dropdown @endif">
					<a href="{{ URL::to('/')}}/{{$value->slug}}" class="header-menu__item__name">{{$value->name}}</a>
					@if(count($submenu) > 0)
					<ul class="header-menu__submenu flex">
						@foreach($submenu as $key => $values)
						<li class="header-menu__submenu__item">
							<a href="{{ URL::to('phong-cach/')}}/{{$values->slug}}" class="header-menu__submenu__item__href">
								<h3>{{ $values ->name }}</h3>
								<img src="{{Voyager::image('/')}}{{$values->images}}" alt=""/>
							</a>
						</li>
						@endforeach
					</ul>
					@endif
				</li>
			@endforeach
			<!-- <li class="header-menu__item dropdown">
				<a href="{{ URL::to('/phong-cach-kien-truc')}}" class="header-menu__item__name"> Phong Cách Kiến Trúc</a>
			</li> -->
		</ul>
	</div>
	<!-- ./Header -->
	@yield('content')
	<!-- Footer -->
	<div class="footer">
		<div class="container flex">
			<div class="footer__item">
				<div class="footer__item__header">Về chúng tôi</div>
				<div class="footer__item__content">
					<p>{{ $textinfo->textfooter }}</p>
				</div>
			</div>
			<div class="footer__item">
				<div class="footer__item__header grey">Danh sách</div>
				<ul class="footer__item__list">
					@foreach($menuhomes as $key => $value)
					<li class="footer__item__list__text">
						<a href="{{ URL::to('/')}}/{{$value->slug}}">{{$value->name}}</a>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="footer__item">
				<div class="footer__item__header">Liên Hệ</div>
				<div class="footer__item__text">Điện thoại: {{ $textinfo->phone }}</div>
				<div class="footer__item__text">Email: {{ $textinfo->email }}</div>
				<div class="footer__item__text">Địa chỉ: {{ $textinfo->address }}</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
		<div class="modal-body">
			<iframe class="video-modal"></iframe>
		</div>
	</div>
	<!-- ./Footer -->
	<script type="text/javascript" src="{{ URL::to('js/main.js')}}"></script>
</body>
</html>