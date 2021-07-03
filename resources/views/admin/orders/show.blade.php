@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bar-chart"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    <div class="row" id="myDiv">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-globe"></i> {{ $order->order_number }}</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Date: {{ $order->created_at->toFormattedDateString() }}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-4">Client
                            <address><strong>{{ strtoupper($order->user->fullName) }}</strong><br>Email: {{ $order->user->email }}</address>
                        </div>
                        <div class="col-4">Envoyez à
                            <address><strong>{{ $order->first_name }} {{ $order->last_name }}</strong><br>{{ $order->address }}<br>{{ $order->city }}, {{ $order->country }} {{ $order->post_code }}<br>{{ $order->phone_number }}<br></address>
                        </div>
                        <div class="col-4">
                            <b>ID Commande:</b> {{ $order->order_number }}<br>
                            <b>Montant(avec frais livraison):</b> {{ round($order->grand_total + config('settings.shipping'), 2) }} {{ config('settings.currency_symbol') }}<br>
                            <b>Mode de Paiement:</b> {{ $order->payment_method }}<br>
                            <b>Statut de Paiement:</b> {{ $order->payment_status == 1 ? 'Complétée' : 'Non Complétée' }}<br>
                            <b>Statut de la Commande:</b> {{ $order->status }}<br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Produit</th>
                                    <th>UGS #</th>
                                    <th>Quantité</th>
                                    <th>Sous-total</th>
                                    @if ( $order->notes)
                                       <th>note</th>
                                    @endif

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)

                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->product->name }}
                                                @if(sizeof(\unserialize($item->oder_att)) > 0)
                                                    @foreach(\unserialize($item->oder_att) as  $key => $value )
                                                        <dt class="dlist-inline small">
                                                            {{ $key}} : {{ $value}}
                                                        </dt>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{ $item->product->sku }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ round($item->price/$item->quantity, 2) }}{{ config('settings.currency_symbol') }} </td>

                                    @endforeach
                                            @if ( $order->notes)
                                            <td>{{ $order->notes}}

                                            </td>
                                            @endif

                                        </tr>
                                </tbody>
                            </table>
                            <a href="" @click.prevent="printInvoice" target="_blank" class="btn btn-default"><i class="fa fa-print"></i>Imprimer</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ mix('backend/js/app.js') }}"></script>
@endpush
