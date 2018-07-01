@extends('layout')
@section('title')
<title>Liên Hệ</title>
@endsection
@section('content')
<div id="entry-content">
	<div class="fixed-banner flex" style="background-color: #151514; background-image: url(http://furnihaus.kaththemes.com/demo/wp-content/uploads/2017/09/pexels-photo-698170.jpeg); background-repeat: repeat-x; background-position: center center; background-size: center">
		<h3>LIÊN HỆ</h3>
	</div>
	<div class="container">
		<section class="entry-content__contact">
			<div class="entry-content__contact__info flex">
				<div class="entry-content__contact__info__item">
					<img src="{{Voyager::image('phone.png')}}" alt="" width="32"/>
					<h4> SĐT</h4>
					<p>{{ $textinfo->phone }}</p>
				</div>
				<div class="entry-content__contact__info__item">
					<img src="{{Voyager::image('place.png')}}" alt="" width="32"/>
					<h4> ĐỊA CHỈ</h4>
					<p>{{ $textinfo -> address }}</p>
				</div>
				<div class="entry-content__contact__info__item">
					<img src="{{Voyager::image('email.png')}}" alt="" width="32"/>
					<h4> EMAIL</h4>
					<p>{{ $textinfo->email }}</p>
				</div>
			</div>
			<div class="entry-content__contact__form flex">
                <form class="entry-content__contact__form__group" action="{{ URL::to('/get-info')}}" method="POST">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="entry-content__contact__form__group__top flex">
						<input name="name" type="text" placeholder="Họ và Tên *"/>
						<input name="email" type="text" placeholder="Email *"/>
						<input name="phone" type="text" placeholder="SĐT *"/>
					</div>
					<div class="entry-content__contact__form__group__bottom">
						<textarea name="content" cols="30" rows="10">Nội dung tin nhắn *</textarea>
					</div>
					<button  type="submit" class="cherry-btn cherry-btn-medium">Gửi</button>
				</form>
				<div class="entry-content__contact__form__map">
					<img src="{{Voyager::image($textinfo->image)}}" alt="" style="max-width: 500px"/>
				</div>
			</div>
		</section>
		<br/>
		<br/>
		<br/>
		<p>{{ $textinfo -> text }}</p>
	</div>
</div>
@endsection