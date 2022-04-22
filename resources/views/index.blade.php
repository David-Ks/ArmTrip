@extends('layouts.base')

@section('title', 'Home')

@section('content')
	<section class="main-section text-center" id="main">
		<div class="h-60" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
			<div class="animation-main">
				<span class="big-text" id="main-text">Welcome</span>
			<br>
			</div>
			<div class="animation-second text-center">
				<span class="m-text">to the best site<!--<span class="m-text-im" id="ForU-1">^U^</span>"-->.</span>
			</div><br><hr class="text-light w-50 alg">
			<div class="animation-third">
				<a href="#first-stage"><button type="button" class="btn btn-outline-light btn-lg">Let's go!</button></a>
			</div>
		</div>
		<!--
		<div>
			<div class="main-gif-1">
			</div>
		</div>
		-->
		<div class="arm-img-main fadeIn-Img">
			<img class="obj-cover" src="https://gsphub.eu/themes/custom/gsphub/templates/images/Armenia.jpg">
		</div>
	</section>
	<div id="first-stage" class="buffer"></div>
	<section class="first-stage text-center bg-border">
		<h1 id="test" class="display-1">About Us</h1><hr class="text-light w-50 alg text-dark">
		<div class="container">
			<div class="row no-flex-for-row">
				<div class="col-7 about-us"><span class="some-text">&nbsp&nbsp&nbsp&nbspThe travel agency specializes in outbound tourism and is successfully engaged in the implementation of tours in such areas as Armenia and Karabakh, as well as in the exotic direction, which is now very popular with tourists. The range of tour packages is large, these are individual tours, and sightseeing tours, and group tours, beach holidays. The travel agency "Tour for ^U^" is engaged in mass tourism, but at the same time it tries to take into account the individual needs of each vacationer.</span></div>
				<div class="col">
					<div class="img-second-div">
						
					</div>
				</div>
			</div>
		</div>
		<hr class="text-light w-50 alg text-dark">
	</section>
	<div id="first-stage" class="buffer"></div>
	<section class="second-stage text-light text-center">
		<h1 id="test" class="display-1">Tour by regions</h1>
		<div class="splide">
		  <div class="splide__track">
				<ul class="splide__list">
					<li class="splide__slide">
						<div class="marz-div yerevan-bg" id="yerevan">
							<span class="region-span">Yerevan</span>
						</div>
					</li>
					<li class="splide__slide">
						<div class="marz-div shirak-bg" id="shirak">
								<span class="region-span">Shirak</span>
						</div>
					</li>
					<li class="splide__slide">
						<div class="marz-div lori-bg" id="lori">
							<span class="region-span">Lori</span>
						</div>
					</li>
					<li class="splide__slide">
						<div class="marz-div tavush-bg" id="tavush">
							<span class="region-span">Tavush</span>
						</div>
					</li>
					<li class="splide__slide">
						<div class="marz-div aragacotn-bg" id="aragacotn">
							<span class="region-span">Aragacotn</span>
						</div>
					</li>
					<li class="splide__slide">
						<div class="marz-div armavir-bg" id="armavir">
							<span class="region-span">Armavir</span>
						</div>
					</li>
					<li class="splide__slide">
						<div class="marz-div kotayk-bg" id="kotayk">
							<span class="region-span">Kotayk</span>
						</div>
					</li>
					<li class="splide__slide">
						<div class="marz-div ararat-bg" id="ararat">
							<span class="region-span">Ararat</span>
						</div>
					</li>
					<li class="splide__slide">
						<div class="marz-div gegarkhuinik-bg" id="gegharkunik">
							<span class="region-span">Gegharkunik</span>
						</div>
					</li>
					<li class="splide__slide">
						<div class="marz-div vaiocdzor-bg" id="vayoc-dzor">
							<span class="region-span">Vaioc Dzor</span>
						</div>
					</li>
					<li class="splide__slide">
						<div class="marz-div syunik-bg" id="syunik">
							<span class="region-span">Syunik</span>
						</div>
					</li>		
				</ul>
		  </div>
		</div>
	</section>
	<div id="first-stage" class="buffer"></div>
	<section class="ginfo-section text-light text-center">
		<h1 id="test" class="display-1">Get more info!</h1>
		<div class="ginfo-div text-dark">
			<a href="#" class="ginfo">
				<div class="info-card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
					<h3 class="info-card-title">Easy to Pay</h3>
					<i class="icon-money icon-5x info-card-icon"></i>
					<span class="info-card-text">Your Balance: 0.0$</span>
				</div>
			</a>
			<a href="{{route('tours')}}" class="ginfo">
				<div class="info-card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
					<h3 class="info-card-title">Lots of Tours</h3>
					<i class="icon-suitcase icon-5x info-card-icon"></i>
					<span class="info-card-text">Active tours: {{$toursCunt}}</span>
				</div>
			</a>
			<a class="ginfo">
				<div class="info-card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
					<h3 class="info-card-title">Convenient Schedule</h3>
					<i class="icon-calendar icon-5x info-card-icon"></i>
					<span class="info-card-text"></span>
				</div>
			</a>
			<a class="ginfo">
				<div class="info-card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
					<h3 class="info-card-title">Comfort</h3>
					<i class="icon-coffee icon-5x info-card-icon"></i>
					<span class="info-card-text"></span>
				</div>
			</a>
			<a class="ginfo">
				<div class="info-card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
					<h3 class="info-card-title">Qualified Guides</h3>
					<i class="icon-user icon-5x info-card-icon"></i>
					<span class="info-card-text">Gids count: {{$gidsCount}}</span>
				</div>
			</a>
			<a href="{{route('review.view')}}" class="ginfo">
				<div class="info-card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
					<h3 class="info-card-title">Comments</h3>
					<i class="icon-comments-alt icon-5x info-card-icon"></i>
					<span class="info-card-text">Comments: {{$commentsCoun}}</span>
				</div>
			</a>
		</div>
		<div class="arm-img-main last-img">
			<img class="obj-cover" src="https://eufordigital.eu/wp-content/uploads/2019/08/armenia.jpg">
		</div>
	</section>
	<div id="first-stage" class="buffer"></div>
	<script type="text/javascript" src="js/mainPage.js"></script>
@endsection