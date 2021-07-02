<script src="{{ asset('frontend/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
{{-- <script src="{{ asset('frontend/js/script.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('frontend/js/main.js') }}"></script>
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
            position:'right',
            phone: numberPhone,
            message: "Je voudrais plus d'informations sur vos produits.",
            popupMessage:'Bienvenu! Comment pouvons nous vous aider ?',
            showPopup:true,
            headerTitle: 'Bienvenu!',
            headerColor: '#c66',
            backgroundColor:'#c66',
            buttonImage: '<img src="/frontend/whatsapp/shop.svg" />'
        });
    });
    /* $(function(){
     $('.carousel').carousel({
     interval: 1000
     });
     });*/
     $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay:true,
        autoplayTimeout:2000,
        pagination: false,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
});
//     $(function() {
//     $("#news-slider").owlCarousel({
//         items : 5,
//         itemsDesktop:[1199,2],
//         itemsDesktopSmall:[980,2],
//         itemsMobile : [700,1],
//         pagination:false,
//         navigation:true,
//         navigationText:["",""],
//         // autoPlay:true
//        });
//     });
 </script>

