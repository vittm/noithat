@extends('layout')
@section('content')
<div id="entry-content">
	<div class="container">
		@if(isset($listingsHot))
		<section class="entry-content__wrap flex">
				<a href="{{ URL::to('/tin-tuc')}}/{{ $listingsHot->slug }}" class="entry-content__wrap__item">
					<h2 class="entry-content__wrap__item__title">{{ $listingsHot->title }}</h2>
					<div class="entry-content__wrap__item__entry">{{ $listingsHot->excerpt }}</div>
					<div class="entry-content__wrap__item__more">Xem Thêm</div>
				</a>
				<a class="entry-content__wrap__img">
					<img src="{{Voyager::image($listingsHot->image)}}" alt=""/>
				</a>
		</section>
		@endif
		<section class="entry-content__wrap-group flex">
            <div>
			@if(count($listings) > 0)
                @foreach($listings as $key => $value)
				<?php
					$flag = false;
					if($value -> category_id != null){
						$check = DB::table('categories')->where('id','=',$value->category_id)->first();
					}else {
						$check = DB::table('categories')->where('slug','=','tin-tuc')->first();
					}
				?>
				@if($check->slug == 'tin-tuc') 
                <a href="{{ URL::to('/tin-tuc')}}/{{ $value->slug }}" class="entry-content__wrap-group__item-listing flex">
				@elseif($check->slug == 'tuyen-dung')
				<a href="{{ URL::to('/tuyen-dung')}}/{{ $value->slug }}" class="entry-content__wrap-group__item-listing flex">
				@endif
                    <div class="entry-content__wrap-group__item-listing__img">
                        <img src="{{Voyager::image($value->image)}}" alt=""/>
                    </div>
                    <div class="entry-content__wrap-group__item-listing__group">
                        <div class="entry-content__wrap-group__item-listing__title">{{ $value->title}}</div>
                        <div class="entry-content__wrap-group__item-listing__des">{{ $value->excerpt }}</div>
                    </div>
                </a>
                @endforeach
			@endif
			@if(count($listings) == 0)
				<img src="https://2d4c832dkqs41ggdbm34qddf-wpengine.netdna-ssl.com/wp-content/uploads/2016/08/recruiting.young_.professionals.jpg" style="width: 100%"alt="">
			@endif
            </div>
			<div class="entry-content__wrap-group__right">
				<div class="entry-content__wrap-group__right__quote">
					<div class="entry-content__wrap-group__right__quote__title">
						<span>Favourite Quotes</span>
					</div>
					<div class="entry-content__wrap-group__right__quote__box">My favorite things in life don't cost any money. It's really clear that the most precious resource we all have is time.
						<span class="entry-content__wrap-group__right__quote__box--author"> - STEVE JOBS</span>
					</div>
				</div>
				<a href="{{{ $bannerblog->url or '' }}}" class="entry-content__wrap-group__right__banner">
					<br>
					@if(isset($bannerblog->images))
					<img src="{{Voyager::image($bannerblog->images)}}" style="max-width:240px"/>
					@endif
				</a>
			</div>
		</section>
	</div>
</div>
@endsection