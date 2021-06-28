<!-- FOOTER -->
<footer class="site-footer ">
    <div class="main">
        <div class="module-small ">
            <div class="container">
              <div class="row">
                <div class="col-sm-3">
                  <div class="widget">
                    <h5 class="widget-title font-alt">{{ config('settings.site_name')}}</h5>
                    <ul class="icon-list">
                      <div class="widget-posts-image"><a href="#"><img src="{{ asset('storage/'.config('settings.site_logo')) }}" alt="Post Thumbnail"/></a></div></li>
                      <br><br><br><br> <div class="text-dark">N'hésitez pas à nous contacter, nos services sont disponibles 24h/24 et 7j/7</div>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="widget">
                    <h5 class="widget-title font-alt">{{strtoupper('services')}}</h5>
                    <ul class="icon-list">
                      <li><a href="{{url('qui_sommes_nous')}}">Qui somme nous ?</a></li>
                      <li> <a href="{{route('contact')}}">Contactez nous</a></li>
                      <li> <a href="{{url('documents/conditions.pdf')}}">Termes et conditions</a></li>
                      <li> <a href="{{url('documents/conditions.pdf')}}">Confidentialité et sécurité</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="widget">
                    <h5 class="widget-title font-alt">Contact</h5>
                    <ul class="icon-list">
                     @if (config('settings.social_facebook'))
                         <li><a href="{{config('settings.social_facebook')}}"><i class="fab fa-facebook">&nbsp;&nbsp;Facebook</i></a></li>@endif
                     @if (config('settings.social_twitter'))
                         <li><a href="{{config('settings.social_twitter')}}"><i class="fab fa-twitter">&nbsp;&nbsp;Twitter</i></a></li>@endif
                     @if (config('settings.social_instagram') )
                     <li><a href="{{config('settings.social_instagram')}}"><i class="fab fa-instagram">&nbsp;&nbsp;Instagram</i></a></li>@endif
                     @if (config('settings.social_youtube') )
                      <li><a href="{{config('settings.social_youtube')}}"><i class="fab fa-youtube">&nbsp;&nbsp;Youtube</i></a></li>@endif
                    </ul>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="widget">
                    <h5 class="widget-title font-alt">VOUS AVEZ DES QUESTIONS ?</h5>
                    <p><i class="fas fa-map-marker-alt "></i> &nbsp; {{ strtoupper(config('settings.address'))}}<br></p>
                    <i class="fas fa-phone-square"></i><a href="tel:{{ config('settings.phone')}}" class="href"> &nbsp; {{config('settings.phone')}} </a><br>
                    <p> <i class="fas fa-envelope"></i><a href="mailto:{{ config('settings.default_email_address')}}">&nbsp;&nbsp;&nbsp;{{ config('settings.default_email_address')}}</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr class="divider-d">
          <footer class="footer ">
            <div class="container">
              <div class="row">
                <div class="col-sm-6">
                  <p class="copyright text ">&copy;2021&nbsp;<a href="\">{{ config('settings.site_name')}}</a>, Tous les droits sont réservés</p>
                </div>
                <div class="col-sm-6">
                  <div class="footer-social-links">
                      <button><i class="fab fa-cc-visa fa-2x"></i></button>
                      <button><i class="fab fa-cc-paypal fa-2x"></i></button>
                      <button><i class="fab fa-cc-mastercard fa-2x"></i></button>

                  </div>
                </div>
              </div>
            </div>
          </footer>
    </div>
    <div class="scroll-up"><a href="#totop"><i class="fab fa-angle-double-up"></i></a></div>
  </footer>
