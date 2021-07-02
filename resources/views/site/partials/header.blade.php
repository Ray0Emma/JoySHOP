
 <nav class="navbar fixed-top navbar-expand-lg  navbar-light bg-lignt p-md-3">
    <div class="container">
      <div class="navbar-brand">
        <a href="{{ route('home') }}">
            <img class="logo" src="{{ asset('storage/'.config('settings.site_logo')) }}" alt="logo">
        </a>
       </div>
       <button
            style="border-color: #c66"
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon" ></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto"></div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " href="{{ route('home') }}">Accueil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Catégories</a>
            <div class="dropdown-menu">
            @foreach($categories as $cat)
              @foreach($cat->items as $category)
                    <a class="dropdown-item" href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}">
                        {{ $category->name }}
                    </a>
                    @if ($category->items->count() > 0)
                        @foreach($category->items as $item)
                            <a class="dropdown-item" href="{{ route('category.show', $item->slug) }}">
                                {{ $item->name }}
                            </a>
                        @endforeach
                    @endif
              @endforeach
            @endforeach
          </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/qui_sommes_nous')}}">Qui Sommes Nous?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{route('contact') }}">Contactez Nous</a>
          </li>
          <li class="nav-item">
            <a href="{{route('checkout.cart') }}" class="nav-link " >
                {{-- @if(Auth::check())
                    <i class="fa fa-shopping-cart"></i><small>({{ Cart::getContent()->count() }})</small>
                @else --}}
                    <i class="fa fa-shopping-cart"></i><small>({{ $cartCount }})</small>
                {{-- @endif --}}

            </a>
          </li>
          @guest
          <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link " >
                    <i class="fa fa-user"></i>
                    <span>Se Connecter</span>
                </a>
          </li>
          <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link " >
                    <i class="fa fa-user"></i>
                    <span>S'inscrire</span>
                </a>
            @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle "
                           href="{{ url('home') }}" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                           v-pre
                        >
                            {{ ucwords(Auth::user()->full_name) }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"
                             aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('account.orders') }}">Commandes</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            @endguest
          </li>
        </ul>
      </div>
    </div>
  </nav>



  {{-- <script src="js/bootstrap.bundle.min.js"></script> --}}
  <script type="text/javascript">
    var nav = document.querySelector('nav');

    window.addEventListener('scroll', function () {
      if (window.pageYOffset > 100) {
        nav.classList.add('bg-white', 'shadow');
      } else {
        nav.classList.remove('bg-white', 'shadow');
      }
    });
  </script>
