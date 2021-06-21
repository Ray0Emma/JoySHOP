<!-- FOOTER -->
<footer class="site-footer ">
    <div class="main">
        <div class="module-small ">
            <div class="container">
              <div class="row">
                <div class="col-sm-3">
                  <div class="widget">
                    <h5 class="widget-title font-alt">{{ config('settings.site_name')}}</h5>
                    <p><i class="fas fa-map-marker-alt "></i>&nbsp;332 BD BRAHIM ROUDANI 5EME ETAGE N 21, CASABLANCA.</p>
                    <i class="fas fa-phone-square"></i><a href="tel:{{ config('settings.phone')}}" class="href"> &nbsp; +1 234 567 89 10 </a><br>

                    <p> <i class="fas fa-envelope"></i><a href="mailto:{{ config('settings.default_email_address')}}">&nbsp;{{ config('settings.default_email_address')}}</a></p>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="widget">
                    <h5 class="widget-title font-alt">{{strtoupper('Nos Pages')}}</h5>
                    <ul class="icon-list">
                      <li><a href="#">Accueil</a></li>
                      <li> <a href="#">Categories</a></li>
                      <li> <a href="#">Qui somme nous ?</a></li>
                      <li> <a href="#">Contactez nous</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="widget">
                    <h5 class="widget-title font-alt">Nos Contact</h5>
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
                    <h5 class="widget-title font-alt"> Paiement </h5>
                    <ul class="widget-posts">
                      <li class="clearfix">
                        <div class="widget-posts-image"><a href="#"><img src="{{ asset('storage/'.config('settings.site_logo')) }}" alt="Post Thumbnail"/></a></div>
                        <div class="widget-posts-body">
                          <div class="widget-posts-title"><a href="#">Designer Desk Essentials</a></div>
                          <div class="widget-posts-meta">23 january</div>
                        </div>
                      </li>
                      <li class="clearfix">
                        <div class="widget-posts-image"><a href="#"><img src="{{ asset('storage/'.config('settings.site_logo')) }}" alt="Post Thumbnail"/></a></div>
                        <div class="widget-posts-body">
                          <div class="widget-posts-title"><a href="#">Realistic Business Card Mockup</a></div>
                          <div class="widget-posts-meta">15 February</div>
                        </div>
                      </li>
                    </ul>
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
                  <p class="copyright ">&copy;2021&nbsp;<a href="\">{{ config('settings.site_name')}}</a>, Tous les droits sont réservés</p>
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
