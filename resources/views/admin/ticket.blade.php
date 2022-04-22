@extends('admin.panel')

@section('content')
	<div class="user">
		<form class="bg-dark text-light" style="padding: 10px; border-radius: 10px;" action="{{route('ticket.create')}}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="mb-3">
			  	<label for="title">Title</label>
				<input class="form-control" type="text" name="title" placeholder="Ticket title" required>
			</div>
			<div class="mb-3">
			  	<label for="content">Content</label>
				<textarea class="form-control" id="content" name="content" rows="3" placeholder="Ticket content" required></textarea>
			</div>
			<div class="mb-3">
			  	<label for="date">Date</label>
  				<input class="form-control" type="date" id="date" name="date" required>
			</div>
			<div class="mb-3">
			  	<label for="price">Price</label>
  				<input type="number" class="form-control" name="price" id="price" placeholder="Ticket price" required>
			</div>
			<div class="mb-3">
			  	<label for="count">Count</label>
  				<input type="number" id="count" class="form-control" name="count" placeholder="Tickets count" required>
			</div>
			<div class="mb-3">
				<label for="formFile" class="form-label">Image</label>
				<input class="form-control" type="file" name="img" accept="image/png, image/gif, image/jpeg" id="formFile">
			</div>
			<div class="mb-3">

			<label for="gids" class="mt-4">Guids</label>
				<select class="form-select" id="gids" name="gid_id" aria-label="Default select example" required>
					@foreach($gids as $gid)
						@isset($gid->user->id)
						<option value="{{$gid->user->id}}">{{$gid->user->name}}</option>
						@endisset
					@endforeach
				</select>
			</div>
			@foreach($errors->all() as $error)
		        <div class="alert alert-danger" role="alert">
				  {{$error}}
				</div>
		    @endforeach
			<div class="mb-3">
				@foreach($regions as $region)
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="{{$region->id}}" id="flexCheckDefault{{$region->id}}" name="regions[]">
					  <label class="form-check-label" for="flexCheckDefault{{$region->id}}">
					    {{$region->region}}
					  </label>
					</div>
				@endforeach
			</div>
			<button class="btn btn-primary" type="submit">Create</button>
		</form>
		<hr>
		@foreach($tickets as $ticket)
			<div class="view">
				<form class="bg-dark text-light" style="padding: 10px; border-radius: 10px" action="{{route('ticket.change')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<div>ID: {{$ticket->id}}</div>
					<input type="text" name="id" value="{{$ticket->id}}" hidden>
					<label for="title" class="mt-4">Title</label>
					<input class="form-control" type="text" name="title" value="{{$ticket->title}}">

					<label for="content" class="mt-4">Content</label>
					<textarea class="form-control" id="content" name="content" rows="3">{{$ticket->content}}</textarea>

					<label for="date" class="mt-4">Date</label>
  					<input class="form-control" value="{{$ticket->date}}" type="date" id="date" name="date">

  					<label for="price" class="mt-4">Price</label>
  					<input type="number" class="form-control" name="price" id="price" value="{{$ticket->price}}">

  					<label for="count" class="mt-4">Count</label>
  					<input type="number" id="count" class="form-control" name="count" value="{{$ticket->count}}">
  					<img src="{{$ticket->img}}" class="mt-4" style="width:350px; height: 200px; object-fit: cover;">
  					<div class="mb-3">
					  <label for="formFile" class="form-label mt-4">New image</label>
					  <input class="form-control" type="file" name="img" accept="image/png, image/gif, image/jpeg" id="formFile" value="{{$ticket->img}}">
					</div>
					<label for="gids" class="mt-4">Guids</label>
					<select class="form-select" id="gids" name="gid_id" aria-label="Default select example">
					  <option value="{{$ticket->gid->id}}" selected>{{$ticket->gid->user->name}}</option>
					  @foreach($gids as $gid)
				  		@isset($gid->user->id)
						  	@if($gid->user->id != $ticket->gid->user->id)
							  	<option value="{{$gid->user->id}}">{{$gid->user->name}}</option>
							@endif
						@endisset
					  @endforeach
					</select>
					<div class="mb-3 mt-3">
						Regions
						@foreach($ticket->regions as $region)
							{{$region->region}}, 
						@endforeach
					</div>
					<button class="btn btn-primary mt-2" type="submit">Change</button>
				</form>
				<form action="{{route('ticket.delete')}}" method="POST">
					<input type="text" name="id" value="{{$ticket->id}}" hidden>
					{{csrf_field()}}
					<button class="btn btn-danger mt-2" type="submit">Delete</button>
				</form>
			</div>
			<hr>
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
	    @if($page + 1 < $pagesCount / 3 + 1)
	    	<li class="page-item"><a class="page-link text-dark" href="?page={{$page+1}}">{{$page + 1}}</a></li>
	    @endif
	    @if($page + 2 < $pagesCount / 3 + 1)
		    <li class="page-item">
		      <a class="page-link" href="?page={{$page+2}}" aria-label="Next">
		        <span class="text-dark" aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
	    @endif
	  </ul>
	</nav>
@endsection