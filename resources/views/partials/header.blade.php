<header>
	<nav class="navbar navbar-inverse bg-inverse navbar-toggleable-md bg-faded">
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand" href="{{ route('home') }}">
		  <i class="fas fa-home"></i>
	  </a>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item {{ Request::is('/') ? 'active':'' }}">
	        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item {{ Request::is('crop') ? 'active':'' }}">
	        <a class="nav-link" href="{{ route('crop.index') }}">View Crops</a>
	      </li>
	      <li class="nav-item {{ Request::is('crop/create') ? 'active':'' }}">
	        <a class="nav-link" href="{{ route('crop.create') }}">Add Crop</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="post">
            {{ csrf_field() }}
	      <input class="form-control mr-sm-2" type="text" name="search_string"
                 placeholder="Search name or method">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>
</header>