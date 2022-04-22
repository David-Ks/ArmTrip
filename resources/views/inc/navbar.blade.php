<nav class="navbar fixed-top navbar-expand-lg navbar-light my-bg-color nav-pad">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">ArmTrip</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-dark">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('tours')}}">Tours</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('review.view')}}">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('saper')}}">Saper</a>
        </li>
      </ul>
      <span class="navbar-text text-dark">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @auth
            <li class="nav-item">
              <a class="nav-link active" href="{{route('tickets.my')}}">My tickets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('balance')}}">Balance: {{Auth::user()->balance}}$</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('logout')}}">Log out</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('login')}}">Log in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('register')}}">Sign in</a>
            </li>
          @endauth
        </ul>
      </span>
    </div>
  </div>
</nav>
  
