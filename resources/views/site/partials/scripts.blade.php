<script src="{{ asset('frontend/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
{{-- <script src="{{ asset('frontend/plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/plugins/owlcarousel/owl.carousel.min.js') }}"></script> --}}
{{-- <script src="{{ asset('frontend/js/script.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/lib/simple-text-rotator/jquery.simple-text-rotator.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/imagesloaded/imagesloaded.pkgd.js') }}"></script>
    <script src="{{ asset('frontend/lib/flexslider/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('frontend/lib/wow/dist/wow.js') }}"></script> --}}
{{-- <script src="{{ mix('backend/js/app.js') }}"></script> --}}
<script src="{{ asset('frontend/whatsapp/floating-wpp.min.js') }}" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
<script src="https://contable.eurolatina.travel/js/jquery.loading.js"></script>
@stack('scripts')
{{-- {{dd(config('settings.phone'))}} --}}
<script type="text/javascript">
    var numberPhone={{config('settings.phone')}};
    $(function () {
    $('#myDiv').floatingWhatsApp({
            phone: numberPhone,
            message: "Je voudrais plus d'informations sur vos produits.",
            // popupMessage:'',
            // showPopup:true,
            showOnIE:true,
        });
    });
    /* $(function(){
     $('.carousel').carousel({
     interval: 1000
     });
     });*/
</script>

