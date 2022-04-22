<footer class="footer text-dark foot-footer">
	<div class="footer-header text-left">
		<div>
			<h5 class="text-uppercase">ArmTrip grup<h5>
	   		<p>- We're pleased to have you here!</p>
		</div>
	</div>
	<hr class="mb-4">
	<div class="container-fluid text-center text-md-left form-box">
		<div class="row">
			<div class="col-md-6 mt-md-0 mt-3">
				<iframe class="map" id="gmap_canvas" src="https://maps.google.com/maps?q=yerevan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
				<a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/"></a>
				<br>
			</div>
			<hr class="clearfix w-100 d-md-none pb-3">
			<form class="col-md-6 mb-md-0 mb-3 text-white" method="POST" action="{{route('message.send')}}">
				{{csrf_field()}}
				@auth
					<input type="text" value="{{Auth::user()->id}}" name="user_id" hidden>
				@endauth
				<div class="text-md-left">
					<h1 class="text-md-left">Do you have a Question?</h1>
				</div>
				<div class="ask-form bg-dark">
					<div class="mb-3">
					  	<label for="name" class="form-label">Topic</label>
					  	<input type="text" class="form-control" id="name" name="topic" placeholder="Your topic" required>
					</div>
					<div class="mb-3">
					  	<label for="quest" class="form-label">Message</label>
					  	<textarea class="form-control resize-off" id="quest" name="message" rows="10" placeholder="Hmmm?" required></textarea>
					</div>
					<div class="text-end send-btn">
						@auth
							<button class="btn btn-outline-light btn-lg" type="submit">Send</button>
						@else
							<a href="{{route('login')}}"><button class="btn btn-outline-light btn-lg" type="button">Send
							</button></a>
						@endauth
					</div>
				</div>
			</form>
		</div>
		<div style="text-align: center;">
			@foreach($errors->all() as $error)
		        <div class="alert alert-danger" style="width: 90%; display: inline-block; !important;" role="alert">
				  {{$error}}
				</div>
		    @endforeach
		</div>
	</div>
	<hr>
	<div class="footer-copyright text-center py-3">© 2022 Copyright:
	   	<a href="#" class="last-link">AAA.FFFF.com</a>
	</div>
</footer>