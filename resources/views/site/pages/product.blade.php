@extends('site.app')
@section('title', $product->name)
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">{{ $product->name }}</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top" id="site">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
                {{--All Content will goes here--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="row no-gutters">
                            {{-- aside section with 5 columns --}}
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">
                                    @if ($product->images->count() > 0)
                                        <div class="img-big-wrap">
                                            <div class="padding-y">
                                                <a href="{{ asset('storage/'.$product->images->first()->full) }}" data-fancybox="" id="main-img-href">
                                                    <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="" id="main-img">
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="img-big-wrap">
                                            <div>
                                                <a href="https://via.placeholder.com/176" data-fancybox=""><img src="https://via.placeholder.com/176"></a>
                                            </div>
                                        </div>
                                    @endif
                                     @if ($product->images->count() > 0)
                                        <div class="img-small-wrap">
                                            @foreach($product->images as $image)
                                                <div class="item-gallery">
                                                    <img src="{{ asset('storage/'.$image->full) }}" alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </article>
                            </aside>
                            {{-- showing the product informations --}}
                            <aside class="col-sm-7">
                                <article class="p-5">
                                    <h3 class="title mb-3">{{ $product->name }}</h3>
                                    <dl class="row">
                                        <dt class="col-sm-3">UGS</dt>
                                        <dd class="col-sm-9">{{ $product->sku }}</dd>
                                        @if ($product->weight)
                                            <dt class="col-sm-3">Poids</dt>
                                            <dd class="col-sm-9">{{ $product->weight }}</dd>
                                        @endif
                                    </dl>
                                    <div class="mb-3">
                                        @if ($product->special_price > 0)
                                            <var class="price h3 " style="color: #c66">
                                                <span class="num" id="productPrice">{{ $product->special_price }}</span>&nbsp;<span class="currency">{{ config('settings.currency_symbol') }}</span>
                                                &nbsp;&nbsp;&nbsp;
                                                <del class="price-old"> {{ $product->price }}{{ config('settings.currency_symbol') }}</del>
                                            </var>
                                        @else
                                            <var class="price h3 " style="color: #c66">
                                                <span class="num" id="productPrice">{{ $product->price }}</span>&nbsp;<span class="currency">{{ config('settings.currency_symbol') }}</span>
                                            </var>
                                        @endif
                                    </div>
                                    <hr>
                                    <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <dl class="dlist-inline">
                                                    @foreach($attributes as $attribute)
                                                        @php $attributeCheck = in_array($attribute->id, $product->attributes->pluck('attribute_id')->toArray()) @endphp
                                                        @if ($attributeCheck)
                                                            <dt>{{ $attribute->name }}: </dt>
                                                            <dd>
                                                                <select class="form-control form-control-sm option" style="width:180px;" name="{{ strtolower($attribute->name ) }}">
                                                                    <option data-price="0" value="0"> Choisir un {{ $attribute->name }}</option>
                                                                    @foreach($product->attributes as $attributeValue)
                                                                        @if ($attributeValue->attribute_id == $attribute->id)
                                                                            <option
                                                                                data-price="{{ $attributeValue->price }}"
                                                                                value="{{ $attributeValue->value }}"> {{ ucwords($attributeValue->value . ' +'. $attributeValue->price) }}{{ config('settings.currency_symbol') }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </dd>
                                                        @endif
                                                    @endforeach
                                                </dl>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <dl class="dlist-inline">
                                                    <dt>Quantité: </dt>
                                                    <dd>
                                                        <input class="form-control" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty" style="width:70px;">
                                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->special_price != '' ? $product->special_price : $product->price }}">
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-dark" style="background-color: #c66;border: rgb(250, 250, 250);"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>&nbsp;&nbsp;
                                        <a href="{{ route('home') }}" class="btn btn-dark" style="border: rgb(250, 250, 250);"><i class="fas fa-plus-square"></i> Continuer à acheter</a>
                                        {{-- <a href="{{ route('checkout.cart') }}" class="btn btn-danger"><i class="fas fa-archive"></i> Terminer l'achat</a> --}}
                                    </form>
                                </article>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <article class="card mt-4">
                        <div class="card-body">
                            {!! $product->description !!}
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    swal('Il est obligatoire de choisir un attribue');
                }
            });
            $('.option').change(function () {
                $('#productPrice').html("{{ $product->special_price != '' ? $product->special_price : $product->price }}");
                let extraPrice = $(this).find(':selected').data('price');
                let price = parseFloat($('#productPrice').html());
                let finalPrice = (Number(extraPrice) + price).toFixed(2);
                $('#finalPrice').val(finalPrice);
                $('#productPrice').html(finalPrice);
            });

            // change gallery image
            $(".gallery-wrap .img-small-wrap .item-gallery img ").click(function () {
                $('#main-img').attr('src', $(this).attr('src').replace('', ''));
                $('#main-img-href').attr('href', $(this).attr('src').replace('', ''));
            });
        });
    </script>
@endpush
