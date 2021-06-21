<header class="section-header">
    <section class="header-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="brand-wrap">
                        <a href="{{ url('/') }}">
                            <img class="logo" src="{{ asset('storage/'.config('settings.site_logo')) }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    {{-- <h5 class="title">Siguenos:</h5>
                    <div class="btn-group white">
                        <a class="btn btn-facebook" title="Facebook" target="_blank" href="{{ config('settings.social_facebook') }}"><i
                                class="fab fa-facebook-f  fa-fw"></i></a>
                        <a class="btn btn-instagram" title="Instagram" target="_blank" href="{{ config('settings.social_instagram') }}"><i
                                class="fab fa-instagram  fa-fw"></i></a>
                    </div> --}}
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
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->full_name }} <span class="caret"></span>
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
    {{-- <div class="col-12 col-carousel">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @if(count($carousels) > 0)
                @foreach($carousels as $key => $carousel)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <img src="{{url('/')}}/{{$carousel->logo}}" class="d-block w-100"  alt="{{$carousel->name}}">
                </div>
                @endforeach
                @else
                <div class="carousel-item active">
                    <img class="d-block w-100"  src="https://mdbootstrap.com/wp-content/uploads/2017/09/slider-fb.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://i.ytimg.com/vi/RMKQ7tO_-dA/maxresdefault.jpg">
                </div>
                @endif
                <!--<div class="carousel-item active">
                    <img class="d-block w-100"  src="https://mdbootstrap.com/wp-content/uploads/2017/09/slider-fb.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://i.ytimg.com/vi/RMKQ7tO_-dA/maxresdefault.jpg">
                </div>-->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div> --}}
</header>

