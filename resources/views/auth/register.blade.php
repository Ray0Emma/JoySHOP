@extends('site.app')
@section('title', 'Login')
@section('content')
<div style="margin-top: 110px">
    <section class="section-pagetop ">
        <div class="container clearfix">
            <h2 class="title-page">{{ __('Register') }}</h2>
        </div>
    </section>
</div>
<section class="section-content bg padding-y border-top">
    <section class="contact section-padding">
        <div class="container">
             <div class="row">
                <div class="col-lg-6 mx-auto col-md-7 col-12 py-5 mt-5 text-center" data-aos="fade-up">
                    <h1 class="mb-4">Connecter <strong>maintenant</strong> et contitnue vos achats</h1>
                    <p>Vous avez un compte ? <a  href="{{route('login')}}">Se connecter</a></p>
                </div>
                <div class="col-lg-8 mx-auto col-md-10 col-12 ">
                    <form method="POST" action="{{ route('register') }}" role="form">
                        @csrf

                      <div class="row">
                            <div class="col-lg-6 col-12">
                                <input id="first_name" type="text" class="mb-3 form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus
                                       placeholder="prénom"
                                       style="padding: 24px 30px 24px 20px;">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        <div class="col-lg-6 col-12">
                                <input id="last_name" type="text" class="mb-3 form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus style="padding: 24px 30px 24px 20px;"
                                       placeholder="nom">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>



                        <div class="col-md-6 col-12">
                                <input id="password" type="password" class=" mb-3 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="padding: 24px 30px 24px 20px;"
                                        placeholder="mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-6 col-12">
                                <input id="password-confirm" type="password" class="mb-3 form-control" name="password_confirmation" required autocomplete="new-password" style="padding: 24px 30px 24px 20px;"
                                       placeholder="confirmez votre mot de passe">
                        </div>
                        <div class="col-lg-12 col-12">
                            <input id="email" type="email" class=" mb-5 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="padding: 24px 30px 24px 20px;"
                                   placeholder="adresse e-mail">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-5 mx-auto col-7">
                                <button type="submit" class=" form-control btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
