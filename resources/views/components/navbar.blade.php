<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <img src="/media/logo.png" class="navbar-brand logo m-0 p-0" alt="blogLogo">
      <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link @if (Route::is('homepage')) active @endif" href="{{route('homepage')}}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link @if (Route::is('allStories')) active @endif" href="{{route('allStories')}}">Tutte le storie</a>
          </li>

          {{-- dropdown delle categorie --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorie
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('storiesByCategory', ['category' => 1])}}">Amore Difficile</a></li>
                <li><a class="dropdown-item" href="{{route('storiesByCategory', ['category' => 2])}}">Primo Amore</a></li>
                <li><a class="dropdown-item" href="{{route('storiesByCategory', ['category' => 3])}}">Amicizia che Cambia</a></li>
                <li><a class="dropdown-item" href="{{route('storiesByCategory', ['category' => 4])}}">Amore Segreto</a></li>
                <li><a class="dropdown-item" href="{{route('storiesByCategory', ['category' => 5])}}">Anime Gemelle</a></li>
            </ul>
        </li>

          

          @guest
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ospite
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
              <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
            </ul>
          </li>
          @endguest

          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenut*, {{auth()->user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('writeStory')}}">Scrivici la tua storia</a></li>
              <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#logout').submit();">Logout</a></li>
            </ul>
          </li>
          
          <form action="{{ route('logout') }}" method="POST" id="logout">
            @csrf
          </form>

          @endauth


          
          
         
        </ul>
       
      </div>
    </div>
  </nav>