@extends('site.app')
@section('title', 'Accueil')

@section('content')
<style>

.containerr {
  width: 90%;
  max-width: 1000px;
  margin: 50px auto;
  display: flex;
  align-items: center;
  justify-content: center;
}
.left {
  width: 50%;
  height: 600px;
  background: url("/frontend/img/alex-shaw-kIcFTNvx3fY-unsplash.jpg")
  no-repeat center / cover;
  border-radius: 0px;
}
.right {
  width: 50%;
  min-height: 400px;
  background-color: #c66;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 30px;
  border-radius: 8px;
  color: white;
  margin-left: -150px;
}
.right h1 {
  font-size: 40px;
  font-weight: lighter;
}
.right p {
  margin: 20px 0;
  font-weight: 500;
  line-height: 25px;
}
.right a {
  text-decoration: none;
  text-transform: uppercase;
  background-color: white;
  color: #c66;
  padding: 20px 30px;
  display: inline-block;
  letter-spacing: 2px;
}

@media only screen and (max-width: 768px) {
    .containerr {
    flex-direction: column;
    width: 100%;
    margin: 0 20px;
  }
  .left {
    width: 100%;
    height: 400px;
  }
  .right {
    width: 90%;
    margin: 0;
    margin-top: -100px;
  }
}

/* -------------------------------------------------------------------
Products owlcarousal
------------------------------------------------------------------- */

.product {
	background-color: #fff;
	text-align: center;
	margin: 0 5px;
}
.product .product-image {
	overflow: hidden;
	position: relative;
}
.product .product-image a.image {
	display: block;
}
.product .product-image img {
	width: 100%;
	height: auto;
}
.product .product-image .pic-1 {
	transition: .5s;
}
.product .product-image:hover .pic-1 {
	opacity: 0;
}
.product .product-image .pic-2 {
	width: 100%;
	height: 100%;
	backface-visibility: hidden;
	opacity: 0;
	position: absolute;
	top: 0;
	left: 0;
	transition: .5s;
}
.product .product-image:hover .pic-2 {
	opacity: 1;
}
.product .discount {
	color: #fff;
	background: #c66;
	font-size: 12px;
	font-weight: 600;
	letter-spacing: 1px;
	line-height: 30px;
	width: 50px;
	height: 30px;
	position: absolute;
	top: 10px;
	left: 10px;
}
.product .cart {
	color: #fff;
	background: rgba(0, 0, 0, 0.692);
	font-size: 12px;
	font-weight: 500;
	text-transform: uppercase;
	width: 100%;
	padding: 4px 14px;
	opacity: .85;
	transform: translateX(-50%);
	position: absolute;
	bottom: -75px;
	left: 50%;
	transition: .5s;
}
.product .cart:hover {
	opacity: 1;
	color: #fff;
	background: #c66;
}
.product:hover .cart {
	bottom: 0px;
}
.product .content {
	padding: 12px;
}
.product .category {
	font-size: 17px;
	margin: 0 0 5px;
	display: block;
}
.product .category a {
	color: #999;
	transition: .5s;
	font-size: 11px;
}
.product .category a:hover {
	color: #555;
}
.product .title {
	font-size: 14px;
	font-weight: 500;
	margin: 0 0 8px;
}
.product .title a {
	color: #444;
	transition: .5s;
}
.product .title a:hover {
	color: #c66;
}
.product .price {
	color: #c66;
	font-size: 14px;
	font-weight: 700;
}
.product .price span {
	color: #888;
	margin: 0 5px 0 0;
	font-weight: 300;
	font-size: 12px;
}
  OWL
.owl-controls .owl-buttons {
	position: relative;
}
.owl-controls .owl-prev {
	position: absolute;
	left: -40px;
	bottom: 185px;
	padding: 8px 17px;
	background: #c66;
	border-radius: 50px;
	transition: .5s;
}
.owl-controls .owl-next {
	position: absolute;
	right: -40px;
	bottom: 185px;
	padding: 8px 17px;
	background: #c66;
	border-radius: 50px;
	transition: .5s;
}
/*
.owl-controls .owl-prev:after, .owl-controls .owl-next:after {
	content: '\f104';
	font-family: FontAwesome;
	color: #fff;
	font-size: 16px;
}
.owl-controls .owl-next:after {
	content: '\f105';
}
.owl-controls .owl-prev:hover, .owl-controls .owl-next:hover {
	background: #000;
} */

</style>
  <!-- *******************   -->
  <!--  !!!!!!!!!!!!!!!!!!!!!!!!!!! -->
  <!--  This Code is for only the floating card in right bottom corner -->
<section class="section-content  padding-y p-5">
    <div class="containerr">
      <div class="left"></div>
      <div class="right">
        <div class="content">
          <h1>Qui Sommes Nous ?</h1>
          <p>{{config('settings.about_us')}}</p>
          <a href="#" class="btn">Click Me</a>
        </div>
      </div>
    </div>
  </section>

<!-- Banner Image  -->
<section class="section-content  padding-y p-5">
    <div class="container">
        <h3 class="text-center m-5"><strong> Produits Populaires</strong></h3>
        <div class="row">
           @include('site.partials.nav')
        </div>
    </div>
 </section>

<!-- Categories  -->
<div class="container">
 <section class="section-content  padding-y">
    <div class="container">
        <h3 class="text-center m-5"><strong>Catégories Populaires</strong></h3>
        <div class="row">
            @forelse($categories as $category)
            <div class="col-md-4 col-home">
                <div class="image-rounded">
                    <a href="{{ route('category.show', $category->slug) }}">
                        <img src="{{ asset('storage/'.$category->image) }}" >

                    </a>
                </div>
                <h5 class="name-categoria">{{$category->name}}</h5>
                <div class="overlay">
                    <a href="{{ route('category.show', $category->slug) }}">
                        <div class="text">
                            <h5>{{strtoupper($category->name)}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @empty
            <p> Aucune catégorie en vedette.</p>
            @endforelse
        </div>
    </div>
  </section>
  {{-- <section class="section-content bg padding-y">
    <div class="row">
        <div id="news-slider" class="owl-carousel">
        @forelse($products as $product)
          <div class="product">
            <div class="product-image"> <a href="{{ route('product.show', $product->slug) }}" class="image">
                @if ($product->images->count() > 0)
                        <img  src="{{ asset('storage/'.$product->images->first()->full) }}" alt="...">
                @else
                    <img class="pic-1" src="https://via.placeholder.com/176" alt="...">
                @endif
                </a> <a href="{{ route('product.show', $product->slug) }}" class="cart">Voir Produit</a>
            </div>
            <div class="content"> <span class="category"><a href="">{{ $product->brand->name}}</a></span>
              <h3 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
              <div class="price">
                @if ($product->special_price)
                     {{ $product->price}} <span>{{ $product->special_price}}</span>
                @else
                   {{ $product->price}}
                @endif
              </div>
            </div>
          </div>
          <div class="product">
            <div class="product-image"> <a href="{{ route('product.show', $product->slug) }}" class="image">
                @if ($product->images->count() > 0)
                        <img  src="{{ asset('storage/'.$product->images->first()->full) }}" alt="...">
                @else
                    <img class="pic-1" src="https://via.placeholder.com/176" alt="...">
                @endif
                </a> <a href="{{ route('product.show', $product->slug) }}" class="cart">Voir Produit</a>
            </div>
            <div class="content"> <span class="category"><a href="">{{ $product->brand->name}}</a></span>
              <h3 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
              <div class="price">
                @if ($product->special_price)
                     {{ $product->price}} <span>{{ $product->special_price}}</span>
                @else
                   {{ $product->price}}
                @endif
              </div>
            </div>
          </div>
          @empty
          <p>0 Produit Trouvé.</p>
          @endforelse
        </div>
    </div>
  </div>
 </section> --}}

</div>
@stop
