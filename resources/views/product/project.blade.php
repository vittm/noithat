@extends('layout')
@section('title')
<title>Dự Án</title>
@endsection
@section('content')
<div id="entry-content">
	<div class="fixed-banner flex" style="background-color: #151514; background-image: url(http://furnihaus.kaththemes.com/demo/wp-content/uploads/2017/09/pexels-photo-698170.jpeg); background-repeat: repeat-x; background-position: center center; background-size: center">
		<h3>BÁN LẺ</h3>
	</div>
	<div class="container">
		<section class="entry-content__video">
            @foreach($listings as $key => $value)
                <a href="{{ URL::to('/ban-le')}}/{{ $value->slug }}" class="entry-content__video__item entry-content__video__item__products">
                    <div class="entry-content__video__item__images" alt="" style="background:url({{Voyager::image($value->images)}}) center"}}/></div>
                    <div class="entry-content__video__item__rs-item-content">
                        <div class="entry-content__video__item__rs-item-content__rs-item-content-left">
                            <img src="{{Voyager::image($value->icon)}}" alt="" width="42"/>
                        </div>
                        <div class="entry-content__video__item__rs-item-content__rs-item-content-right">
                            <h4>{{ $value->name }}</h4>
                        </div>
                    </div>
                </a>
			@endforeach
		</section>
	</div>
</div>
<script>
    $('.entry-content__video__item').click(function(){
        e.preventDefault();
        e.stopPropagation();
    });
</script>
@endsection