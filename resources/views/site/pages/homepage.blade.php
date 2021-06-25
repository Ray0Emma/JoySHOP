@extends('site.app')
@section('title', 'Accueil')

@section('content')
<section class="section-content bg padding-y">
    <div class="container">
        <h3>Popular Categories</h3>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4 col-home">
                <div class="image-rounded">
                    <a href="{{ route('category.show', $category->slug) }}">
                        <img src="{{ asset('storage/'.$category->image) }}" >
                        {{-- <dd>
                            {{ dd($category->image) }}
                        </dd> --}}
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
            @endforeach
            <h3>Popular Products</h3>
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
                @endforeach
        </div>
    </div>
</section>
@stop
