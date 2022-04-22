@extends('admin.panel')

@section('content')
	<div class="user">
		<form action="{{route('gid.add')}}" method="POST">
			{{csrf_field()}}
			Select Gid
			<select class="form-select" id="gids" name="user_id" aria-label="Default select example" required>
			  @foreach($users as $user)
			  	@isset($user->name)
				  	@if($user->id != 1)
					  	<option value="{{$user->id}}">{{$user->name}}</option>
					@endif
				@endisset
			  @endforeach
			</select>
			<button class="btn btn-primary mt-2">Add</button>
		</form>
		<hr>
		@foreach($gids as $gid)
			@isset($gid->user->name)
			<p>
				ID:{{$gid->id}}
			</p>
			<p>
				Name: {{$gid->user->name}}
			</p>
			<form action="{{route('gid.delete')}}" method="POST">
				<input type="text" name="id" value="{{$gid->id}}" hidden>
				{{csrf_field()}}
				<button class="btn btn-danger mt-2" type="submit">Delete</button>
			</form>
			<hr>
			@endisset
		@endforeach
	</div>
@endsection