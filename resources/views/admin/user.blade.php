@extends('admin.panel')

@section('content')
	<div class="user">
		@foreach($users as $user)
			@if($user->id != 1)
			<div class="view">
				<div class="view-word">ID: {{$user->id}}</div>
				<div class="view-word">name: {{$user->name}}</div>
				<div class="view-word">Email: {{$user->email}}</div>
				<div class="view-word">Number: {{$user->number}}</div>
				<div class="view-word">Balance: {{$user->balance}}</div>
				<img src="{{$user->img}}" style="width: 100px; height: 100px; object-fit: cover;">
				<form action="{{route('user.newimg')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="text" value="{{$user->id}}" name="id" hidden>
					<div class="mb-3">
					  <label for="formFile" class="form-label">New image</label>
					  <input class="form-control" type="file" name="img" accept="image/png, image/gif, image/jpeg" id="formFile">
					</div>
					<button class="btn btn-primary" type="submit">Change</button>
				</form>
				<form action="{{route('user.delete')}}" method="POST" enctype="multipart/form-data">
					<input type="text" value="{{$user->id}}" name="id" hidden>
					{{csrf_field()}}
					<button class="btn btn-danger mt-2" type="submit">Delete</button>
				</form>
			</div>
			<hr>
			@endif
		@endforeach
	</div>
	<nav aria-label="Page navigation example">
	  <ul class="pagination pagination-for-tours pagination-lg justify-content-center mt-4">
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
@endsection