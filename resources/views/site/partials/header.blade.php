{{-- <header class="section-header">
    <section class="header-main" id="section-header">
        <div class="container">
            <div class="row align-items-center" >
                <div class="col-lg-3">
                    <div class="brand-wrap">
                        <a href="{{ url('home') }}">
                            <img class="logo" src="{{ asset('storage/'.config('settings.site_logo')) }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="widgets-wrap d-flex justify-content-center">
                        <div class="widget-header">
                            <a href="{{route('home') }}" >
                                <div class="text-wrap">
                                    <p>Acceuil</p>
                                </div>
                            </a>
                        </div>
                        {{-- <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav">
                                @foreach($categories as $cat)
                                    @foreach($cat->items as $category)
                                        @if ($category->items->count() > 0)
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                                                <div class="dropdown-menu" aria-labelledby="{{ $category->slug }}">
                                                    @foreach($category->items as $item)
                                                        <a class="dropdown-item" href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a>
                                                    @endforeach
                                                </div>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget-header">
                            <a href="/qui_somme_nous" >
                                <div class="text-wrap">
                                    <p>Qui Sommes Nous ?</p>
                                </div>
                            </a>
                        </div>
                        <div class="widget-header">
                            <a href="{{route('contact') }}" >
                                <div class="text-wrap">
                                    <p>Contactez Nous</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widgets-wrap d-flex justify-content-end">
                        <div class="widget-header">
                            <a href="{{route('checkout.cart') }}" class="icontext">
                                <div class="icon-wrap icon-xs bg2 round text-secondary"><i
                                        class="fa fa-shopping-cart"></i></div>
                                <div class="text-wrap">
                                    <small>{{ $cartCount }} articles</small>
                                </div>
                            </a>
                        </div>
                        @guest
                            <div class="widget-header">
                                <a href="{{ route('login') }}" class="ml-3 icontext">
                                    <div class="icon-wrap icon-xs bg-primary round text-white"><i class="fa fa-user"></i></div>
                                    <div class="text-wrap"><span>Login</span></div>
                                </a>
                            </div>
                            <div class="widget-header">
                                <a href="{{ route('register') }}" class="ml-3 icontext">
                                    <div class="icon-wrap icon-xs bg-success round text-white"><i class="fa fa-user"></i></div>
                                    <div class="text-wrap"><span>Register</span></div>
                                </a>
                            </div>
                        @else
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ strtoupper(Auth::user()->full_name) }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
   @include('site.partials.nav')
</header>
 --}}
 <!-- Navbar  -->

 <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
    <div class="container">
      <div class="navbar-brand">
        <a href="{{ route('home') }}">
            <img class="logo" src="{{ asset('storage/'.config('settings.site_logo')) }}" alt="logo">
        </a>
       </div>
       <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto"></div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " style="color: black" href="{{ route('home') }}">Accueil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color: black"  data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Catégories</a>
                <div class="dropdown-menu multi-level">
                    <a class="dropdown-item" href="#one">1</a>
                    <div class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="">2</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#one">hi</a>
                            <a class="dropdown-item" href="#one">hi</a>
                        </div>
                        <a class="dropdown-item" href="#one">3</a>
                    </div>
                </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " style="color: black" href="{{url('/qui_sommes_nous')}}">Qui Sommes Nous?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " style="color: black" href="{{route('contact') }}">Contactez Nous</a>
          </li>
          <li class="nav-item">
            <a href="{{route('checkout.cart') }}" class="nav-link " style="color: black">
                {{-- @if(Auth::check())
                    <i class="fa fa-shopping-cart"></i><small>({{ Cart::getContent()->count() }})</small>
                @else --}}
                    <i class="fa fa-shopping-cart"></i><small>({{ $cartCount }})</small>
                {{-- @endif --}}

            </a>
          </li>
          @guest
          <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link " style="color: black">
                    <i class="fa fa-user"></i>
                    <span>Login</span>
                </a>
          </li>
          <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link " style="color: black">
                    <i class="fa fa-user"></i>
                    <span>Register</span>
                </a>
            @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle " style="color: black"
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

  <!-- Banner Image  -->
  @include('site.partials.nav')

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
