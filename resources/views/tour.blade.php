@extends('layouts.base')

@section('title', 'Tour')

@section('content')
	<div class="descrip">
		<div class="descrip-tour">
			<div class="descrip-title">{{$tour->title}} <b> #{{$tour->id}}</b></div>
			<div class="descrip-body">
				{{$tour->content}}
			</div>
			<div class="descrip-img">
				<img src="https://www.worldtravelguide.net/wp-content/uploads/2017/03/shu-Armenia-Yerevan-757639399-EDITORIALONLY-1440x823.jpg" class="descrip-img">
			</div>
			<div class="descrip-gid-img">
				<img src="https://24tv.ua/resources/photos/news/640_DIR/202011/1462051_14706246.jpg?202011194800" class="descrip-img">
				Gid: {{$tour->gid->user->name}}
			</div>
			<hr style="width: 60%;">
			<div class="descrip-about">
				Tickets count: {{$tour->count}}<br>
				Start: {{$tour->date}}<br>
				Price: {{$tour->price}}$<br>
				<div class="buy-btn">
					<form method="POST" action="{{route('buy', $tour->id)}}">
						{{csrf_field()}}
						<button type="submit" class="buy-btn">Buy</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection