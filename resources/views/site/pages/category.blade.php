@extends('site.app')
@section('title', $category->name)
@section('content')
<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">{{ $category->name }}</h2>
    </div>
</section>
<section class="section-content bg padding-y">
    <div class="container">
        <div class="filters-group">
            <div class="filter-options">
                @foreach($filtro as $key)
                <button class="btn btn-outline-info" data-group="{{$key}}">{{strtoupper($key)}}</button>
                @endforeach
            </div>
        </div><br>

        <div id="code_prod_complex" id="grid">
            <div class="row">
                @forelse($category->products as $product)
                    @php
                    $portions= explode(" ", $product->name);
                    @endphp
                    <div class="col-md-4 picture-item" data-groups='["{{strtolower($portions[0])}}"]'>
                        <figure class="card card-product" href="{{ route('product.show', $product->slug) }}">
                            @if ($product->images->count() > 0)
                                <div class="img-wrap padding-y"><img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="{{$product->name}}"></div>
                            @else
                                <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt="{{$product->name}}"></div>
                            @endif
                            <figcaption class="info-wrap">
                                <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                            </figcaption>
                            <div class="bottom-wrap">
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-sm btn-success float-right"><i class="fa fa-cart-arrow-down"></i> Acheter maintenant</a>
                                @if ($product->special_price != 0)
                                    <div class="price-wrap h5">
                                        <span class="price"> {{ $product->special_price.config('settings.currency_symbol') }} </span>
                                        <del class="price-old"> {{ $product->price.config('settings.currency_symbol') }}</del>
                                    </div>
                                @else
                                    <div class="price-wrap h5">
                                        <span class="price"> {{ $product->price.config('settings.currency_symbol') }} </span>
                                    </div>
                                @endif
                            </div>
                        </figure>
                    </div>
                @empty
                    <p class="alert alert-warning">Aucun produit trouvé dans {{ $category->name }}.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@stop
