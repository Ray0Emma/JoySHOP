<!-- FOOTER -->
<footer class="site-footer ">
    <div class="container ">
      <div class="row">

        <div class="col-lg-5 mx-lg-auto col-md-8 col-10">
          <h1 class="" data-aos="fade-up" data-aos-delay="100">
              We make creative <strong>brands</strong> only.</h1>
        </div>

        <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200">
          <h4 class="my-4">Contact Info</h4>

          <p class="mb-1">
            <i class="fa fa-phone mr-2 footer-icon"></i>
            +212 633 366 901
          </p>

          <p>
            <a href="mailto:{{ config('settings.default_email_address')}}"">
              <i class="fa fa-envelope mr-2 footer-icon"></i>
                  {{ config('settings.default_email_address')}}
           </a>
          </p>
        </div>

        <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="300">
          <h4 class="my-4">Our Studio</h4>

          <p class="mb-1">
            <i class="fa fa-home mr-2 footer-icon"></i>
                {{ config('attributes.is_filterable')}}
          </p>
        </div>

        <div class="col-lg-4 mx-lg-auto text-center col-md-8 col-12" data-aos="fade-up" data-aos-delay="400">
          <p class="copyright-text">&copy;2021 Tout droit reserve FRay
        </div>

        <div class="col-lg-4 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">

          <ul class="footer-link">
            <li><a href="#">Stories</a></li>
            <li><a href="#">Work with us</a></li>
            <li><a href="#">Privacy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
          <ul class="social-icon">
            <li><a href="#" class="fab fa-facebook"></a></li>
            <li><a href="https://twitter.com/FRay81194" class="fab fa-twitter"></a></li>
            <li><a href="#" class="fab fa-dribbble"></a></li>
            <li><a href="#" class="fab fa-instagram"></a></li>
          </ul>
        </div>

      </div>
    </div>
  </footer>
