<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<title>Admin Panel</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container-fluid">
	    <div class="collapse navbar-collapse" id="navbarNav">
	      <ul class="navbar-nav">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<section class="panel">
		<div class="panel-btns" style="position: fixed;">
			<div class="list-group">
				<a class="no-dec" href="{{route('panel.user')}}">
			  		<button type="button" class="list-group-item list-group-item-action">Users</button>
			  	</a>
				<a class="no-dec" href="{{route('panel.ticket')}}">
			  		<button type="button" class="list-group-item list-group-item-action">Tickets/Tours</button>
			  	</a>
			  	<a class="no-dec" href="{{route('panel.gid')}}">
			  		<button type="button" class="list-group-item list-group-item-action">Gids</button>
			  	</a>
			  	<a class="no-dec" href="{{route('panel.ques')}}">
			  		<button type="button" class="list-group-item list-group-item-action">Questions</button>
			  	</a>
			</div>
		</div>
		<div class="panel-controle">
			@yield('content')
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>