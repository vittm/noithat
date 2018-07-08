@extends('layout')
@section('content')
<div id="entry-content">
	<div class="container">
		<section class="entry-content__slider">
			@if(count(json_decode($detail->productive,JSON_BIGINT_AS_STRING)) > 0)
				@foreach(json_decode($detail->productive,JSON_BIGINT_AS_STRING) as $key => $values)
					<div class="entry-content__slider__content-group @if($key == 0 ) active @endif">
						<div class="flex">
							<div class="entry-content__slider__content-group__images">
								<img class="prev" src="{{Voyager::image('left-angle-bracket.png')}}" width="23"/>
								<img class="next" src="{{Voyager::image('play-symbol.png')}}" width="23"/>
								<img class="main-img" src="{{Voyager::image($values	['images'])}}"/>
							</div>
							<div class="entry-content__slider__content-group__box">
								<h3 class="entry-content__slider__content-group__box__title">{{ $detail->title }}</h3>
								<div class="entry-content__slider__content-group__box__text">{!! $values['description'] !!}</div>
								<br>
								<a href="tel:{{$values['contact']}}">Liên hệ: {!! $values['contact'] !!}</a>
								<p>Giá: {!! $values['price'] !!} </p>
							</div>
						</div>
					</div>
				@endforeach
			@endif
			<h5 class="entry-content__slider__color">Màu sản phẩm </h5>
				@if(count(json_decode($detail->productive,JSON_BIGINT_AS_STRING)) > 0)
					<div class="entry-content__slider__thumb flex">
						@foreach(json_decode($detail->productive,JSON_BIGINT_AS_STRING) as $key => $values)
							<div class="entry-content__slider__thumb__images @if($key == 0 ) active @endif">
								<div style="height:80px;background:#{{$values['color']}}"></div>
							</div>
						@endforeach
					</div>
				@endif
		</section>
	</div>
</div>
@endsection