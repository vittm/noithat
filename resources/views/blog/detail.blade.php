@extends('layout')
@section('title')
<title>{{ $detail->title }}</title>
@endsection
@section('facebook_meta')
    <meta property="og:locale" content="vi_VN" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="{{ $detail->title }}" />
	@if($detail->meta_description != null)
	<meta property="og:description"   content="{{ $detail->meta_description}}" />
	@endif
	@if($detail->meta_description == null)
	<meta property="og:description"   content="{!! $detail->excerpt !!}" />
	@endif
    <meta property="og:image"         content="{{Voyager::image($detail->image)}}    " />
    <meta name="keywords"             content="{{ $detail->meta_keywords}}"/>
@endsection
@section('content')
<div id="entry-content">
	<div class="container">
		<section class="entry-content__wrap-group flex">
			<a style="min-height:fit-content" class="entry-content__wrap-group__item-listing">
				<div class="entry-content__wrap-group__item-listing__img no-before-pseudo-element">
					<img src="{{Voyager::image($detail->image)}}" alt=""/>
				</div>
				<h3 class="entry-content__wrap-group__item-listing__detail-blog-title">{{ $detail->title }}</h3>
				<div class="entry-content__wrap-group__item-listing__detail-blog-group flex">
					<div class="entry-content__wrap-group__item-listing__detail-blog-author">Đăng bởi: Admin</div>
					<div class="entry-content__wrap-group__item-listing__detail-blog-date">Ngày đăng: {{ $detail->created_at }}</div>
				</div>
				<div class="entry-content__wrap-group__item-listing__detail-blog-content">{!! $detail->body !!}</div>
			</a>
			<div class="entry-content__wrap-group__right">
				<div class="entry-content__wrap-group__right__quote">
					<div class="entry-content__wrap-group__right__quote__title">
						<span>Favourite Quotes</span>
					</div>
					<div class="entry-content__wrap-group__right__quote__box">My favorite things in life don't cost any money. It's really clear that the most precious resource we all have is time.
						<span class="entry-content__wrap-group__right__quote__box--author"> - STEVE JOBS</span>
					</div>
				</div>
				<div class="entry-content__wrap-group__right__banner">
					<div class="entry-content__wrap-group__right__quote__title">
						<span>Ad-Banner</span>
					</div>
					<img src="https://adtima-media-td.zadn.vn/2018/06/6ca7dc8f-a44f-4904-ba87-84056a510774/Right.png"/>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection