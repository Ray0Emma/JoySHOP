<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Réglages Généraux</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="site_name">Nom du site</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le nom du site"
                    id="site_name"
                    name="site_name"
                    value="{{ config('settings.site_name') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="phone">Telephone</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="+212xxxxxxxxx"
                    id="phone"
                    name="phone"
                    value="{{ config('settings.phone') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="address">Adresse du magasin</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez Adresse du magasin"
                    id="address"
                    name="address"
                    value="{{ config('settings.address') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="default_email_address">Adresse E-mail </label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="Entrez l'adresse e-mail du magasin"
                    id="default_email_address"
                    name="default_email_address"
                    value="{{ config('settings.default_email_address') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_code">Code de Devise</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le code de devise du magasin"
                    id="currency_code"
                    name="currency_code"
                    value="{{ config('settings.currency_code') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_symbol">Symbole de la Devise</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le symbole de la devise du magasin"
                    id="currency_symbol"
                    name="currency_symbol"
                    value="{{ config('settings.currency_symbol') }}"
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
