@extends('site.app')
@section('title', 'Login')
@section('content')
<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">Connexion</h2>
    </div>
</section>
<section class="section-content bg padding-y border-top">
    <section class="contact section-padding">
        <div class="container">
             <div class="row">
                <div class="col-lg-6 mx-auto col-md-7 col-12 py-5 mt-5 text-center" data-aos="fade-up">
                    <h1 class="mb-4"><strong>Bienvenue</strong> cher client, contactez-nous <strong>maintenant</strong></h1>
                    <p>ou écrivez-nous à <a href="mailto:{{config('settings.default_email_address')}}">{{config('settings.default_email_address')}}</a></p>
                </div>
                  <div class="col-lg-8 mx-auto col-md-10 col-12 ">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col-lg-12 col-12">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-lg-12 col-12">
                            <label for="password" >{{ __('Mot de Passe') }}</label>
                                <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" rows="6"  name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input md-5" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 mx-auto col-7">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@stop
