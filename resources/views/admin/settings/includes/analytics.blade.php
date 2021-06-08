<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Analytique</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="google_analytics">Code Google Analytics</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Entrez le code de Google Analytics"
                    id="google_analytics"
                    name="google_analytics"
                >{!! Config::get('settings.google_analytics') !!}</textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="facebook_pixels">Code Facebook pixel</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Entrez le code Facebook pixel"
                    id="facebook_pixels"
                    name="facebook_pixels"
                >{{ Config::get('settings.facebook_pixels') }}</textarea>
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
