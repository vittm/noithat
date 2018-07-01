@extends('layout')
@section('title')
<title>Phong Cách Thiết Kế</title>
@endsection
@section('content')
<div id="entry-content">
	<div class="fixed-banner flex" style="background-color: #151514; background-image: url(http://furnihaus.kaththemes.com/demo/wp-content/uploads/2017/09/pexels-photo-698170.jpeg); background-repeat: repeat-x; background-position: center center; background-size: center">
		<h3>PHONG CÁCH THIẾT KẾ</h3>
	</div>
	<div class="container">
		<section class="entry-content__type">
            @foreach($listings as $key => $value)
                <a href="{{ URL::to('/phong-cach')}}/{{$value->slug}}" class="entry-content__type__item">
                    <img class="entry-content__type__item__images" src="{{Voyager::image($value->images)}}" alt=""/>
                    <div class="entry-content__type__item__title">
                        <p>{{ $value->name }}</p>
                        <div class="entry-content__type__item__more">Xem thêm</div>
                    </div>
                </a>
            @endforeach
		</section>
	</div>
</div>
@endsection