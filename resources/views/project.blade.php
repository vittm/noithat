@extends('layout')
@section('title')
<title>Dự Án</title>
@endsection
@section('content')
<div id="entry-content">
	<div class="fixed-banner flex" style="background-color: #151514; background-image: url(http://furnihaus.kaththemes.com/demo/wp-content/uploads/2017/09/pexels-photo-698170.jpeg); background-repeat: repeat-x; background-position: center center; background-size: center">
		<h3>DỰ ÁN</h3>
	</div>
	<div class="container">
		<section class="entry-content__video">
            @foreach($listings as $key => $value)
                <div class="entry-content__video__item" data-thevideo="{{ $value->video }}">
                    <img src="{{Voyager::image($value->images)}}" alt=""/>
                    <div class="entry-content__video__item__rs-item-content">
                        <div class="entry-content__video__item__rs-item-content__rs-item-content-left">
                            <p>27/04/2017</p>
                            <img src="{{Voyager::image('play-video.svg')}}" alt="" width="42"/>
                        </div>
                        <div class="entry-content__video__item__rs-item-content__rs-item-content-right">
                            <h4>{{ $value->title }}</h4>
                        </div>
                    </div>
                </div>
			@endforeach
		</section>
	</div>
</div>
@endsection