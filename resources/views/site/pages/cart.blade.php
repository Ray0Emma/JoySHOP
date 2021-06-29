@extends('site.app')
@section('title', 'Panier')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Panier</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <main class="col-sm-9">
                    @if (\Cart::isEmpty())
                        <p class="alert alert-warning">Votre panier est vide.</p>
                    @else
                        <div class="card">
                            <table class="table shopping-cart-wrap ">
                                <thead class=" thead-dark">
                                <tr style="LINE-HEIGHT:50px">
                                    <th scope="col" >Produit</th>
                                    <th scope="col" width="120">Prix</th>
                                    <th scope="col" width="120">Quantité</th>
                                    <th scope="col" width="120">Total</th>
                                    <th scope="col" class="text-right" width="200"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\Cart::getContent() as $item)
                                    <tr>
                                        <td>
                                            <figure class="media">
                                                <figcaption class="media-body">
                                                    <h6 class="title text-truncate text-dark">{{ strtoupper($item->name) }}</h6>
                                                    @foreach($item->attributes as $key  => $value)
                                                        <dl class="dlist-inline small">
                                                            <dt>{{ ucwords($key) }}: </dt>
                                                            <dd>{{ ucwords($value) }}</dd>
                                                        </dl>
                                                    @endforeach
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price text-dark">{{ ($item->price).config('settings.currency_symbol')  }}</var>
                                            </div>
                                        </td>
                                        <td>
                                            <var class="price text-dark">{{ $item->quantity }}</var>
                                        </td>
                                        <td>
                                                <var class="price text-dark">{{ ($item->price)*($item->quantity).config('settings.currency_symbol')  }}</var>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('checkout.cart.remove', $item->id) }}" class="btn btn-outline-dark"><i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </main>
                <aside class="col-sm-3">
                    <a href="{{ route('checkout.cart.clear') }}" class="btn btn-dark btn-block mb-4">Vider le Panier</a>
                    {{-- <p class="alert alert-success">
                        Ajoutez 5,00 USD d'articles éligibles à votre commande pour bénéficier de la livraison GRATUITE. </p> --}}
                    <dl class="dlist-align ">
                        <dt>Livraison :</dt>
                        <dd class="text-right"><strong>{{ config('settings.shipping') }}{{ config('settings.currency_symbol') }}</strong></dd>
                    </dl>
                    <hr>
                    <dl class="dlist-align ">
                        <dt>Montant :</dt>
                        <dd class="text-right"><strong>{{ \Cart::getSubTotal()+config('settings.shipping') }}{{ config('settings.currency_symbol') }}</strong></dd>
                    </dl>
                    <hr>
                    <figure class="itemside mb-3">
                        <aside class="aside text-dark"><i class="far fa-money-bill-alt fa-3x"></i></aside>
                        <div class="text-wrap small text-muted">
                            Payez en espèces devant votre porte
                            <br> et recevez vos articles
                        </div>
                    </figure>
                    <figure class="itemside mb-3">
                        <aside class="aside text-dark"> <i class="fab fa-cc-paypal fa-3x"></i></aside>
                        <div class="text-wrap small text-muted">
                            Payer maintenant en toute sécurité avec
                            <br> votre compte Paypal
                        </div>
                    </figure>
                    <figure class="itemside mb-3">
                        <aside class="aside text-dark"> <i class="fas fa-shipping-fast fa-3x"></i></aside>
                        <div class="text-wrap small text-muted">
                            Payez maintenant et Recevez vos articles
                            <br> dans les plus brefs délais
                        </div>
                    </figure>
                    <a href="{{ route('checkout.index') }}" class="btn btn-outline-dark btn-lg btn-block">Passer à la caisse</a>
                </aside>
            </div>
        </div>
    </section>
@stop
