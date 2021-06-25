<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">
            Liens Sociaux</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="social_facebook">Profil Facebook</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le lien du profil facebook"
                    id="social_facebook"
                    name="social_facebook"
                    value="{{ config('settings.social_facebook') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_twitter">Profil Twitter</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le lien du profil twitter"
                    id="social_twitter"
                    name="social_twitter"
                    value="{{ config('settings.social_twitter') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_instagram">Profil Instagram</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le lien du profil instagram"
                    id="social_instagram"
                    name="social_instagram"
                    value="{{ config('settings.social_instagram') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_youtube">Profil Youtube</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Entrez le lien de profil youtube"
                    id="social_youtube"
                    name="social_youtube"
                    value="{{ config('settings.social_youtube') }}"
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
