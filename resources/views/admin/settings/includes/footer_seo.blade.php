<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Pied de Page &amp; SEO</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                {{-- there an error here  --}}
                <label class="control-label" for="about_us">Qui Sommes Nous</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Saisir le texte qui sommes nous"
                    id="about_us"
                    name="about_us"
                >{{ config('settings.about_us') }}</textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="seo_meta_title">Meta Titre de Référencement</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le Meta Titre de référencement pour le magasin"
                    id="seo_meta_title"
                    name="seo_meta_title"
                    value="{{ config('settings.seo_meta_title') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="seo_meta_description">Meta Description de Référencement</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Entrez la Meta description de référencement pour le magasin"
                    id="seo_meta_description"
                    name="seo_meta_description"
                >{{ config('settings.seo_meta_description') }}</textarea>
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
