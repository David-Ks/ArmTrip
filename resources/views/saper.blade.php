@extends('layouts.base')

@section('css')
	<link rel="stylesheet" type="text/css" href="../css/saper.css">
@endsection

@section('title', 'Saper')

@section('content')
	<div>
		<div class="sudoku-div text-center">
			<div class="main-div center">
			</div>
			<div class="second-div center">
				<div class="n-block fo-flag" id="1n">
					<i class="icon-flag"></i>
				</div>
				<div class="n-block fo-flag-active" id="2n">
					<i class="icon-hand-down"></i>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        !!GAME OVER!!!
	      </div>
	      <div class="modal-footer">
	        <a href="{{route('saper')}}"><button type="button" class="btn btn-primary">Retry</button></a>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        !!YOU WIN!!!
	      </div>
	      <div class="modal-footer">
	        <a href="{{route('saper')}}"><button type="button" class="btn btn-primary">Retry</button></a>
	      </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript" src="../js/saper.js"></script>
@endsection