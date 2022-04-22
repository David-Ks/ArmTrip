@extends('layouts.base')

@section('css')
	<link rel="stylesheet" type="text/css" href="../css/tours.css">
@endsection

@section('title', 'Tours')

@section('content')
	<section class="main-section text-center" id="main">
		<div class="h-60" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
			<div class="animation-main">
				<span class="big-text" id="main-text">Tours</span>
			<br>
			</div>
			<div class="animation-second text-center">
				<span class="m-text">The best tours for you.</span>
			</div><br><hr class="text-light w-50 alg">
		</div>
	</section>

	<div class="text-center">
		<div class="settings">
			<h2 class="text-dark">Tours</h2>
			<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
				<i class="icon-align-left"></i>
			</button>	
		</div>
	</div>

	@isset($searchRegions)
		<div class="search-box text-center text-light mt-3 mb-3">
			@foreach($searchRegions as $region)
				{{$region->region}} /
			@endforeach
		</div>
	@endisset

	<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
	  <div class="offcanvas-header">
	    <h5 id="offcanvasRightLabel">Settings</h5>
	    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	  </div>
	  <div class="offcanvas-body">
	    <form class="tours" method="GET" action="{{route('tours')}}">
			<input type="text" id="disabledTextInput" name="search" class="form-control" value="0" hidden>
			<span class="form-marz">Select regions</span>
			@foreach($regions as $region)
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="{{$region->id}}" id="flexCheckDefault{{$loop->index}}" name="region[]"  @foreach($searchRegions as $regions) @if($regions->region == $region->region) checked @endif @endforeach>
				  <label class="form-check-label" for="flexCheckDefault{{$loop->index}}">
				    {{$region->region}}
				  </label>
				</div>
			@endforeach
			<button type="submit" class="btn btn-primary view-btn">View</button>
		</form>
	  </div>
	</div>

	<section class="tour-card">
		@foreach($tours as $tour)
			@if($tour->count > 0)
				<div class="tour-card">
					<div class="tour-card-img">
						<img class="tour-card-img" src="{{$tour->img}}">
						@foreach($gids as $gid)
							@if($gid->id == $tour->gid_id)
								<img src="{{$gid->user->img}}" class="tour-card-gid">
							@endif
						@endforeach
					</div>
					<div class="tour-card-text">
						<div class="tour-card-title">
							{!! \Illuminate\Support\Str::substr($tour->title, 0,15) !!}..
						</div>
						<div class="tour-card-content">
							{!! \Illuminate\Support\Str::substr($tour->content, 0, 450) !!}...
						</div>
						<div class="text-xxl-end mt-2">
							<a href="{{route('tour.view', $tour->ticket_id)}}" class="tour-card-btn">
								<button class="btn btn-lg btn-primary">More</button>
							</a>
						</div>
					</div>
				</div>
			@endif
		@endforeach
	</section>

	<div class="pagination"></div>
@endsection