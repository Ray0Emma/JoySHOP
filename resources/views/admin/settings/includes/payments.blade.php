<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Paramètres de paiement</h3>
        <hr>
            <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="shipping">Prix Livraison</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le prix de livraison ex:10"
                    id="shipping"
                    name="shipping"
                    value="{{ config('settings.shipping') }}"
                />
            </div>
            {{-- it should be number --}}
            <div class="form-group">
                <label class="control-label" for="stripe_payment_method">Autre Mode de Paiement </label>
                <select name="stripe_payment_method" id="stripe_payment_method" class="form-control">
                    <option value="1" {{ (config('settings.stripe_payment_method')) == 1 ? 'selected' : '' }}>Activé</option>
                    <option value="0" {{ (config('settings.stripe_payment_method')) == 0 ? 'selected' : '' }}>Désactivé</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="stripe_key">
                    Clé</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le Stripe key"
                    id="stripe_key"
                    name="stripe_key"
                    value="{{ config('settings.stripe_key') }}"
                />
            </div>
            <div class="form-group pb-2">
                <label class="control-label" for="stripe_secret_key">
                    Clef secrète</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le stripe secret key"
                    id="stripe_secret_key"
                    name="stripe_secret_key"
                    value="{{ config('settings.stripe_secret_key') }}"
                />
            </div>
            <hr>
            <div class="form-group pt-2">
                <label class="control-label" for="paypal_payment_method">Mode de paiement PayPal</label>
                <select name="paypal_payment_method" id="paypal_payment_method" class="form-control">
                    <option value="1" {{ (config('settings.paypal_payment_method')) == 1 ? 'selected' : '' }}>Activé</option>
                    <option value="0" {{ (config('settings.paypal_payment_method')) == 0 ? 'selected' : '' }}>Désactivé</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="paypal_client_id">ID Client</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le paypal Id client"
                    id="paypal_client_id"
                    name="paypal_client_id"
                    value="{{ config('settings.paypal_client_id') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="paypal_secret_id">Secret PayPal</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le paypal secret id"
                    id="paypal_secret_id"
                    name="paypal_secret_id"
                    value="{{ config('settings.paypal_secret_id') }}"
                />
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Modifier</button>
                </div>
            </div>
        </div>
    </form>
</div>
