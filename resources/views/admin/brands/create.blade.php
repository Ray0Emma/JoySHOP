@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.brands.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Nom <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Logo de la marque</label>
                            <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo"/>
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('logo') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Enregistrer</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.brands.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
