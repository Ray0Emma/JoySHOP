@extends('site.app')
@section('title', 'Contact')

@section('content')
            @if(Session::has('success'))
                <div class="alert alert-success">
                     {{ Session::get('success') }}
                </div>
            @endif
<!-- CONTACT -->
<section class="contact section-padding">
    <div class="container">
         <div class="row">


              <div class="col-lg-6 mx-auto col-md-7 col-12 py-5 mt-5 text-center" data-aos="fade-up">

                <h1 class="mb-4">Hey there, Let's <strong>talk</strong> about <strong>creative</strong> projects</h1>

                <p>or email us at <a href="mailto:{{config('settings.default_email_address')}}">{{config('settings.default_email_address')}}</a></p>
              </div>

              <div class="col-lg-8 mx-auto col-md-10 col-12">

              <!-- FORM   -->

                <form action="contactez_nous" method="post" class="contact-form" data-aos="fade-up"
                      data-aos-delay="300" role="form">
                      {{csrf_field()}}
                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <input type="text" class="form-control @error('name') is-invalid @enderror"" name="name"
                             placeholder="Nom et Prénom"
                             value="{{ old('name') }}>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                      <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email"
                             placeholder="Adresse Email"
                             value="{{ old('email') }}">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="col-lg-12 col-12">
                        <input class="form-control @error('subject') is-invalid @enderror"" rows="6" name="subject"
                               placeholder="Sujet"
                               value="{{ old('subject') }}"></input>
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-lg-12 col-12">
                      <textarea class="form-control @error('message') is-invalid @enderror"" rows="6" name="message"
                                placeholder="Message..."
                                value="{{ old('message') }}"></textarea>
                      @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="col-lg-5 mx-auto col-7">
                      <button type="submit" class="form-control btn btn-primary " id="submit-button" name="submit">
                              Envoyer</button>
                    </div>
                  </div>

                </form>
              </div>

         </div>
    </div>
</section>
@stop
