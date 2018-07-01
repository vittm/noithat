@extends('layout')
@section('content')
<div id="entry-content">
	<div class="container">
		<section class="entry-content__slider">
            @foreach($detail as $key => $value)
			<div class="entry-content__slider__content-group @if($key == 0 ) active @endif">
				<div class="flex">
					<div class="entry-content__slider__content-group__images">
						<img class="prev" src="{{Voyager::image('left-angle-bracket.png')}}" width="23"/>
						<img class="next" src="{{Voyager::image('play-symbol.png')}}" width="23"/>
						<img class="main-img" src="{{Voyager::image($value->images)}}"/>
					</div>
					<div class="entry-content__slider__content-group__box">
						<h3 class="entry-content__slider__content-group__box__title">{{ $value -> title }}</h3>
						<div class="entry-content__slider__content-group__box__text">{!! $value -> content !!}</div>
					</div>
				</div>
			</div>
			@endforeach
			<div class="entry-content__slider__thumb flex">
                @foreach($detail as $key => $values)
                    <div class="entry-content__slider__thumb__images @if($key == 0 ) active @endif">
                        <img src="{{Voyager::image($values->images)}}"/>
                    </div>
                @endforeach
			</div>
		</section>
	</div>
</div>
@endsection