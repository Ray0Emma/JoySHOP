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
                <label class="control-label" for="site_title">Titre du Site</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le titre du site"
                    id="site_title"
                    name="site_title"
                    value="{{ config('settings.site_title') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="default_email_address">Adresse e-mail par défaut</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="Entrez l'adresse e-mail par défaut du magasin"
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
