@extends('layouts.base')

@section('title', 'My Tickets')

@section('content')
	<div class="my-tickets mt-4">
		<table class="table mt-5 text-light">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Title</th>
		      <th scope="col">Start Date</th>
		      <th scope="col">Region</th>
		      <th scope="col">Gid</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach(Auth::user()->tickets as $ticket)
		    <tr>
		      <th scope="row">{{$loop->index}}</th>
		      <td>{{$ticket->title}}</td>
		      <td>{{$ticket->date}}</td>
		      <td>@foreach($ticket->regions as $region) {{$region->region}} / @endforeach</td>
		      <td>{{$ticket->gid->user->name}}</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
@endsection