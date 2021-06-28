@extends('site.app')
@section('title', 'Accueil')

@section('content')
<div class="container">
    <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" ">
        <div class="container py-5">
            <div class="row px-4 px-lg-5">
                <div class="col-lg-6">
                    <p class="text-muted small text-uppercase mb-2">Comparateur de Prix</p>
                    <h1 class="h2 text-uppercase mb-3">Cherchez votre produit et trouvez le moins cher !</h1><a class="btn btn-dark" >Liste des produits</a>
                </div>
            </div>
        </div>
    </section>
 <section class="section-content bg padding-y">
    <div class="container">
        <h3>Popular Categories</h3>
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
            {{--<h3>Popular Products</h3>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-5 col-home">
                    <div class="image-rounded">
                        <a href="{{ route('product.show', $product->name) }}">
                            @if ($product->images->count() > 0)
                                <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="">
                            @else
                                <img src="https://via.placeholder.com/176" alt="">
                            @endif
                        </a>
                    </div>
                    <h5 class="name-categoria">{{$product->name}}</h5>
                    <div class="overlay">
                        <a href="{{ route('product.show', $product->name) }}">
                            <div class="text">
                                <h5>{{strtoupper($product->name)}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach--}}
        </div>
    </div>
  </section>

    <!-- CATEGORIES SECTION-->
    {{-- <section class="pt-5">
        <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Collections soigneusement créées</p>
            <h2 class="h5 text-uppercase mb-4">Catégories en vedette</h2>
        </header>
        <div class="row">
            @forelse($categories as $category)
            <div class="col-md-3 mb-4">
                <a class="category-item" href="{{ route('category.show' , $category->slug) }}">
                    @if($category->image)
                    <img class="img-fluid" height="200px" src="{{ asset('storage/'.$category->image) }}" alt="">
                    @endif
                    <strong class="category-item-title">{{ $category->name }}</strong></a>
            </div>
            @empty
            <p> Aucune catégorie en vedette.</p>
            @endforelse
        </div>
    </section> --}}
    <!-- TRENDING PRODUCTS-->
    <section class="py-5">
        <header>
            <p class="small text-muted small text-uppercase mb-1">Consultez nos</p>
            <h2 class="h5 text-uppercase mb-4">Produits En Vedette !</h2>
        </header>
        <div class="row">

            @forelse($products as $product)
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="product text-center">
                    <div class="position-relative mb-3">
                        <div class="badge text-white badge-"></div>
                        @if ($product->special_price)
                        <div class="badge text-white badge-danger">Solde !</div>
                        @endif
                        <a class="d-block" href="{{ route('product.show', $product->slug) }}">
                            @if ($product->images->count() > 0)
                            <img class="img-fluid w-100" src="{{ asset('storage/'.$product->images->first()->full) }}" alt="...">

                            @else
                            <img class="img-fluid w-100" src="https://via.placeholder.com/176" alt="...">

                            @endif
                        </a>
                        <div class="product-overlay">
                            <ul class="mb-0 list-inline">
                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="{{ route('product.show', $product->slug) }}">Détails</a></li>
                            </ul>
                        </div>
                    </div>
                    <h6> <a class="reset-anchor" href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h6>
                    <p class="small text-muted">
                        @if ($product->special_price)
                        <del>{{ $product->price}} </del> {{ $product->special_price}}
                        @else
                        {{ $product->price}}
                        @endif

                    </p>
                    <p class="small text-muted">{{ $product->brand->name}} DT</p>
                </div>
            </div>
            @empty
            <p>0 Produit Trouvé.</p>
            @endforelse

        </div>
    </section>
    <!-- SERVICES-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="d-inline-block">
                        <div class="media align-items-end">
                            <svg class="svg-icon svg-icon-big svg-icon-light">
                                <use xlink:href="#delivery-time-1"> </use>
                            </svg>
                            <div class="media-body text-left ml-3">
                                <h6 class="text-uppercase mb-1">Free shipping</h6>
                                <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="d-inline-block">
                        <div class="media align-items-end">
                            <svg class="svg-icon svg-icon-big svg-icon-light">
                                <use xlink:href="#helpline-24h-1"> </use>
                            </svg>
                            <div class="media-body text-left ml-3">
                                <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                                <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-inline-block">
                        <div class="media align-items-end">
                            <svg class="svg-icon svg-icon-big svg-icon-light">
                                <use xlink:href="#label-tag-1"> </use>
                            </svg>
                            <div class="media-body text-left ml-3">
                                <h6 class="text-uppercase mb-1">Festival offer</h6>
                                <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@stop
