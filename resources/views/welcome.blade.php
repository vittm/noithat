@extends('layout')
@section('title')
<title>Nội Thất Tích Hợp</title>
@endsection
@section('content')
<br>
<header class="site-header wide" id="header" style="background-image: url('{{Voyager::image($info_one->images)}}')">
	<div id="static-area-header-top">
		<div class="container">
			<div class="static-header-logo">
				<div class="site-branding">
					<div class="site-description">{{$info_one->text1}}</div>
					<h1 class="site-title">{{$info_one->text2}}</h1>
				</div>
				<div class="box box--skin-1">
					<h3>{{$info_one->text3}}</h3>
					<a class="cherry-btn cherry-btn-primary cherry-btn-medium">{{$info_one->text4}}</a>
				</div>
			</div>
		</div>
	</div>
</header>
<div id="entry-content">
	<div class="container">
		<section class="entry-content__content-header text-center">
			<h2>{{$info_two->text}}</h2>
			<h4>{{$info_two->text1}}</h4>
			<p>{{$info_two->text2}}</p>
			<a class="cherry-btn cherry-btn-medium cherry-btn-add-more">{{$info_two->text3}}</a>
		</section>
		<section class="entry-content__category flex">
			@foreach($projects as $key => $value)
				<div class="entry-content__category__item">
					<a href="#">
						<h3>{{$value->title}}</h3>
						<img src="{{Voyager::image($value->images)}}" alt=""/>
					</a>
				</div>
			@endforeach
		</section>
	</div>
	<section class="entry-content__category flex entry-content__project">
		@foreach($types as $key => $value)
		<div class="entry-content__category__item entry-content__project__item">
			<a href="#">
				<h3>{{ $value->name }}</h3>
				<div class="entry-content__project__item__images" style="background: url('{{Voyager::image($value->images)}}') center center"></div>
				<a href="{{ URL::to('/phong-cach')}}/{{$value->slug}}" class="cherry-btn cherry-btn-medium cherry-btn-add-more">Xem Thêm</a>
			</a>
		</div>
		@endforeach
	</section>
	<section class="flex entry-content__process" style="background-image: url('{{Voyager::image($videos->background)}}')">
		<div class="container">
			<div class="entry-content__process--group flex">
				@foreach($process as $key => $value)
					<div class="entry-content__process__item">
						<div class="entry-content__process__item__icon">
							<img src="{{Voyager::image($value->images)}}" alt=""/>
						</div>
						<h3 class="entry-content__process__item__title">{{ $value->title}}</h3>
						<div class="entry-content__process__item__feauters">{{ $value->content }}</div>
					</div>
				@endforeach
			</div>
			<div class="entry-content__process__box box box--skin-2">
				<h3>{{ $videos->text1 }}</h3>
				<h4>{{ $videos->text2 }}</h4>
				<div class="video-home" style="display:none">{{ $videos->video }}</div>
				<a class="cherry-btn cherry-btn-primary cherry-btn-medium watch-video">{{ $videos->text3 }}</a>
			</div>
		</div>
	</section>
</div>
@endsection