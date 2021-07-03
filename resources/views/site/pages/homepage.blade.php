@extends('site.app')
@section('title', 'Accueil')

@section('content')
<style>
/*
*/
.card {
    border: none;
    background: rgba(228, 227, 227, 0.582);
}
.card-body{
    background: rgba(255, 254, 254, 0.822);
}
/*  */
.circle{
    width: 200px;
    height: 200px;
    border-radius: 50%;
    vertical-align: middle;
    display: table-cell;
    font-size: 40px;
    font-weight: lighter;
    color: rgb(41, 37, 37);
    cursor: pointer;
    background-color: rgb(224, 186, 186);
}
.circle:hover {
    background-color: #c66;
    color: #fff
}
/*  */
.containerr {
  width: 90%;
  max-width: 1000px;
  margin: 50px auto;
  display: flex;
  align-items: center;
  justify-content: center;
}
.btn{
    color: #c66;
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

    <!-- Hero  -->
    @include('site.partials.hero')

    {{-- service --}}
    <section class="section-content " >
        <div class="card">
        <div class="row mx-auto text-center">
        <div class="card text-dark  m-3" style="max-width: 22rem;">
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-handshake fa-2x"></i></h5>
              <p class="card-text">Far far away, behind the word mountains, far from the countries.</p>
            </div>
          </div>
          <div class="card text-dark m-3" style="max-width: 22rem;">
            {{-- <div class="card-header">Header</div> --}}
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-shield-alt fa-2x"></i></h5>
              <p class="card-text">Far far away, behind the word mountains, far from the countries.</p>
            </div>
          </div>
          <div class="card text-dark  m-3" style="max-width: 22rem;">
            {{-- <div class="card-header">Header</div> --}}
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-shipping-fast fa-2x"></i></h5>
              <p class="card-text">Far far away, behind the word mountains, far from the countries.</p>
            </div>
          </div>
        </div>
       </div>
    </section>

    <!-- About US-->
    <section class="section-content  padding-y p-5" >
        <div class="containerr">
        <div class="left"></div>
        <div class="right">
            <div class="content">
            <h1>Qui Sommes Nous ?</h1>
            <p>{{config('settings.about_us')}}</p>
            <a class="btn text-dark" onClick="document.getElementById('product').scrollIntoView();">
                Achetez Maintenant</a>
            </div>
        </div>
        </div>
    </section>

    <!-- Produits Populaires  -->
    <section class="section-content  padding-y " id="product">
        <div class="container">
            <h2 class="text-center mb-5"><strong> Produits Populaires</strong></h2>
            <div class="row">
                @include('site.partials.nav')
            </div>
        </div>
    </section>

    <!-- Categories  -->
    <h2 class="text-center m-5"><strong>Catégories Populaires</strong></h2>
    <section class="section-pagetop">
            <div class="row mx-auto text-center">
                @forelse($categories as $category)
                <div class="mx-auto text-center">
                    <a href="{{ route('category.show', $category->slug) }}">
                    <div class="circle">
                         <p>{{$category->name}}</p>
                    </div>
                </a>
                    {{-- <h5 class="name-categoria">{{$category->name}}</h5>
                    <div class="overlay">
                        <a href="{{ route('category.show', $category->slug) }}">
                            <div class="text">
                                <h5>{{strtoupper($category->name)}}</h5>
                            </div>
                        </a>
                    </div> --}}
                </div>
                @empty
                <p> Aucune catégorie en vedette.</p>
                @endforelse
            </div>
    </section>
@stop
