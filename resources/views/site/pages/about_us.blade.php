@extends('site.app')
@section('title', 'Qui Somme Nous')
@section('content')


  {{-- <div class="u-body">
      <div class="u-clearfix u-header u-header" id="sec-2c43">
            <div class="u-clearfix u-sheet u-sheet-1"></div>
      </div>
      <section class="u-align-center u-clearfix u-section-1" id="carousel_373c">
        <div class="u-expanded-width u-palette-2-light-1 u-shape u-shape-rectangle u-shape-1"></div>
        <div class="u-clearfix u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-size-33">
                <div class="u-layout-row">
                  <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-60 u-layout-cell-1">
                    <div class="u-container-layout u-container-layout-1" src="">
                      <img class="u-image u-image-1" src="images/rtg-min1.jpg">
                      <img src="images/sd.jpg" alt="" class="u-align-left u-image u-image-2">
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-size-27">
                <div class="u-layout-col">
                  <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                    <div class="u-container-layout u-valign-top u-container-layout-2">
                      <h2 class="u-custom-font u-text u-text-1"> Our Mission</h2>
                      <p class="u-text u-text-2">Vel fringilla est ullamcorper eget nulla facilisi. Nibh cras pulvinar mattis nunc. Massa id neque aliquam vestibulum morbi blandit. Viverra adipiscing at in tellus integer feugiat scelerisque varius morbi. Id ornare arcu odio ut sem. Nulla aliquet porttitor lacus luctus accumsan tortor posuere ac ut. Eget felis eget nunc lobortis.</p>
                      <p class="u-text u-text-3"> Team <a href="{{url('/')}}" class="u-active-none u-border-1 u-border-black u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-btn-1" target="_blank">{!!config('settings.site_name') !!}</a>
                      </p>
                      <a href="{{url('/')}}" class="u-black u-btn u-button-style u-hover-grey-80 u-btn-2">Continue a Achetez</a>
                    </div>
                  </div>
                  <div class="u-container-style u-hidden-sm u-hidden-xs u-layout-cell u-right-cell u-size-30 u-layout-cell-3">
                    <div class="u-container-layout u-container-layout-3"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </div> --}}

           {!!config('settings.about_us') !!}
@stop
