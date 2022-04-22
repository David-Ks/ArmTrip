@extends('layouts.base')

@section('title', 'Reviews')

@section('content')
	<section class="main-section for-review text-center" id="main">
		<div class="h-60" data-tilt data-tilt-scale="0.95" data-tilt-startY="40" style="height: 100%;">
			<div class="animation-main">
				<span class="big-text" id="main-text">Reviews</span>
			<br>
			</div>
			<div class="animation-second text-center">
				<span class="m-text">Your opinion is very important for us!</span>
			</div><br><hr class="text-light w-50 alg">
		</div>
	</section>

	<section class="review">
		<form class="review" method="POST" action="{{route('review.add')}}">
			@foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
				  {{$error}}
				</div>
            @endforeach
			{{ csrf_field() }}
			<ul class="pagination">
			    <li class="page-item" id="bad">
			    	<a class="page-link text-dark mark">
			    		Bad
			    	</a>
			    </li>
			    <li class="page-item" id="normal">
			    	<a class="page-link text-dark selected mark">
			    		Normal
			    	</a>
			    </li>
			    <li class="page-item" id="amazing">
			    	<a class="page-link text-dark mark">
			    		Amazing
			    	</a>
			    </li>
			</ul>
			<input type="text" name="raiting" value="Normal" hidden>
			@auth
				<input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
			@endauth
			<div class="form-floating">
			  <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px" required></textarea>
			  <label for="floatingTextarea2">Comments</label>
			</div>
			<div class="text-end">
				@auth
					<button type="submit" class="btn btn-primary mt-4 inline-block">Send</button>
				@else
					<a href="{{route('login')}}"><button type="button" class="btn btn-primary mt-4 inline-block">Send</button></a>
				@endauth
			</div>
		</form>

		@if($pagesCount != 0)
		<div class="all-reviews">
			@foreach($reviews as $review)
				<div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
				  <div class="toast-container position-absolute p-3" id="toastPlacement">
				    <div class="toast">
				      <div class="toast-header">
				        <img src="" class="rounded me-2">
				        <strong class="me-auto">{{$review->user->name}}<div class="rait-box bg-primary">{{$review->raiting}}</div></strong>
				        <small>{{$review->created_at}}</small>
				        @auth
  							@if(Auth::user()->id == $review->user->id)
						        <form class="review-del" method="POST" action="{{route('review.del')}}">
						        	{{ csrf_field() }}
						        	<input type="text" name="id" value="{{$review->id}}" hidden>
						        	<button type="submit" class="btn btn-danger"><i class="icon-bitbucket"></i></button>
						        </form>
						    @endif
					    @endauth
				      </div>
				      <div class="toast-body">
				        {{$review->content}}
				      </div>
				    </div>
				  </div>
				</div>
			@endforeach
		</div>

		<nav aria-label="Page navigation example">
		  <ul class="pagination pagination-lg justify-content-center mt-4">
		  	@if($page - 2 > 0)
			    <li class="page-item">
			      <a class="page-link" href="?page={{$page-2}}" aria-label="Previous">
			        <span class="text-dark" aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
		    @endif
		    @if($page - 1 > 0)
		    	<li class="page-item"><a class="page-link text-dark" href="?page={{$page-1}}">{{$page - 1}}</a></li>
		    @endif
		    <li class="page-item active selected-scale"><a class="page-link text-light b-radius">{{$page}}</a></li>
		    @if($page + 1 < $pagesCount / 6 + 1)
		    	<li class="page-item"><a class="page-link text-dark" href="?page={{$page+1}}">{{$page + 1}}</a></li>
		    @endif
		    @if($page + 2 < $pagesCount / 6 + 1)
			    <li class="page-item">
			      <a class="page-link" href="?page={{$page+2}}" aria-label="Next">
			        <span class="text-dark" aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
		    @endif
		  </ul>
		</nav>
		@endif
	</section>
	<script type="text/javascript" src="../js/review.js"></script>
@endsection