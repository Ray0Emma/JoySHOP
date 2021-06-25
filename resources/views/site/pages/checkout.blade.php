@extends('site.app')
@section('title', 'La Caisse')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">La Caisse</h2>
        </div>
    </section>
    <section class="section-content bg padding-y">
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
            </div>
            <form action="{{ route('checkout.place.order') }}" method="POST" role="form" id="addToCart">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Détails de la Facturation</h4>
                            </header>
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Prénom</label>
                                        <input type="text"
                                               class="form-control @error('first_name') is-invalid @enderror"
                                               name="first_name"
                                               value="{{ old('first_name') }}"
                                        />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('first_name') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col form-group">
                                        <label>Nom</label>
                                        <input type="text"
                                               class="form-control @error('last_name') is-invalid @enderror"
                                               name="last_name"
                                               value="{{ old('last_name') }}"
                                        />
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('last_name') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Addresse</label>
                                    <input type="text"
                                           class="form-control @error('address') is-invalid @enderror"
                                           name="address"
                                           value="{{ old('address') }}">
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('address') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Ville</label>
                                        <input type="text"
                                               class="form-control @error('city') is-invalid @enderror"
                                               name="city"
                                               value="{{ old('city') }}">
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('city') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Pays</label>
                                        <input type="text"
                                               class="form-control @error('country') is-invalid @enderror"
                                               name="country"
                                               value="Maroc" readonly="">
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('country') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6">
                                        <label>Code Postal</label>
                                        <input type="text"
                                               class="form-control @error('post_code') is-invalid @enderror"
                                               name="post_code"
                                               value="{{ old('post_code') }}">
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('post_code') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>Numéro de Téléphone</label>
                                        <input type="text"
                                               class="form-control @error('phone_number') is-invalid @enderror"
                                               name="phone_number"
                                               value="{{ old('phone_number') }}">
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('phone_number') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Adresse E-mail</label>
                                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled>
                                    <small class="form-text text-muted">
                                        Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</small>
                                </div>
                                <div class="form-group">
                                    <label>Notes de Commande</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror"
                                              name="notes"
                                              rows="6">
                                    </textarea>
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('notes') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="terms" id="terms" value="1">
                                        <label class="form-check-label" for="exampleRadios1">
                                            J'accepte les termes et conditions. <a target="_blank" href="{{url('/')}}/documents/conditions.pdf">Voire</a>
                                        </label>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Votre Commande</h4>
                                    </header>
                                    <article class="card-body">
                                        <dl class="dlist-align">
                                            <dt>SubTotal: </dt>
                                            <dd class="text-right h5 b"> {{ \Cart::getSubTotal() }} {{ config('settings.currency_symbol') }}</dd>
                                            <input type="hidden" name="subtotal" id="subtotal" value="{{ \Cart::getSubTotal() }}">
                                        </dl>
                                        <dl class="dlist-align">
                                            <dt>Envio: </dt>
                                            <dd class="text-right h5 b costo"> {{round(confing('setting.shipping'),2)}} {{ config('settings.currency_symbol') }}</dd>
                                            <input type="hidden" name="costo_envio" id="costo_envio" value="{{confing('setting.shipping')}}">
                                        </dl>
                                        <dl class="dlist-align">
                                            <dt>Total: </dt>
                                            <dd class="text-right h5 b total_price"></dd>
                                        </dl>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Modes de paiement</h4>
                                    </header>
                                    <article class="card-body">
                                        {{-- <div class="form-check">
                                            <input class="form-check-input" type="radio" name="forma_pago" id="forma_pago" value="PCB">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Dépôt ou virement bancaire
                                            </label><br>
                                            <div class="cuenta">
                                                <strong>Compte bancaire</strong>
                                            </div>
                                        </div> --}}
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="forma_pago" id="forma_pago" value="PEPM">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Paiement en espèces à la porte de votre maison
                                            </label>
                                        </div>
                                        <div class="form-check">

                                            <input class="form-check-input" type="radio" name="forma_pago" id="forma_pago" value="PAYPAL">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Payer avec Paypal
                                                {{-- <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/na/us/logo-center/9_bdg_secured_by_pp_2line.png" border="0" alt="PayPal Logo"><br> --}}
                                            </label>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Passer la Commande</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop
@push('scripts')
<script>
    $(document).ready(function () {
        var subtotal = $('#subtotal').val();
        var envio = $('#costo_envio').val();
        var total = parseFloat(subtotal) + parseFloat(envio);
        $('.total_price').text( total.toFixed(2) + ' Dhs');
        $('#addToCart').submit(function (e) {
            var val = $('input:radio[name=forma_pago]:checked').val();
            var terms = $('input:checkbox[name=terms]:checked').val();
            if (terms == null) {
                e.preventDefault();
                swal('Vous devez accepter les Termes et Conditions.');
                return
            }
            if (val == null) {
                e.preventDefault();
                swal('Choisissez une méthode de paiement.');
                return
            }
            $('body').loading({
                message: 'Traitement du paiement...',
                theme: 'dark'
            });
        });
    });
</script>
@endpush

