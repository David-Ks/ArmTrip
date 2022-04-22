@extends('admin.panel')

@section('content')
<div class="user">
	@foreach($questions as $question)
		<p>
			ID:{{$question->id}}
		</p>
		<p>
			Topic:{{$question->topic}}
		</p>
		<p>
			Message:{{$question->message}}
		</p>
		<p>
			name:{{$question->user->name}}
		</p>
		<p>
			Emanil:{{$question->user->email}}
		</p>
		<p>
			Number:{{$question->user->number}}
		</p>
		<form action="{{route('question.checked')}}" method="POST">
			{{csrf_field()}}
			Is answered?
			<input type="text" value="{{$question->id}}" name="id" hidden>
			<select class="form-select" style="width: 100px" name="is_answered" aria-label="Default select example">
				@if($question->is_answered == 1)
			  		<option value="{{$question->is_answered}}" selected>Yes</option>
			  		<option value="0">No</option>
			  	@else
			  		<option value="{{$question->is_answered}}" selected>No</option>
			  		<option value="1">Yes</option>
			  	@endif
			</select>
			<button class="btn btn-primary mt-2" type="submit">Change</button>
		</form>
		<hr>
	@endforeach
</div>
@endsection