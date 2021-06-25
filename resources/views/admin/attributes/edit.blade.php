@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-cogs"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">Général</a></li>
                    <li class="nav-item"><a class="nav-link" href="#values" data-toggle="tab">
                        Valeurs d'attribut</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.attributes.update') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Informations sur l'attribut</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="code">Code</label>
                                    <input
                                        class="form-control @error('code') is-invalid @enderror"
                                        type="text"
                                        placeholder="Entrez le code d'attribut"
                                        id="code"
                                        name="code"
                                        value="{{ old('code', $attribute->code) }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('code') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $attribute->id }}">
                                <div class="form-group">
                                    <label class="control-label" for="name">Nom</label>
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Entrez le nom de l'attribut"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $attribute->name) }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                    <input type="hidden" name="frontend_type" id="frontend_type" value="select">
                                    {{-- <label class="control-label" for="frontend_type">Type d'interface</label>
                                    @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
                                    <select name="frontend_type" id="frontend_type" class="form-control @error('frontend_type') is-invalid @enderror">
                                        @foreach($types as $key => $label)
                                            @if ($attribute->frontend_type == $key)
                                                <option value="{{ $key }}" selected>{{ $label }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $label }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('frontend_type') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="is_filterable"
                                                   name="is_filterable"
                                                {{ $attribute->is_filterable == 1 ? 'checked' : '' }}/>Filtrable
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="is_required"
                                                   name="is_required"
                                                {{ $attribute->is_required == 1 ? 'checked' : '' }}/>Obligatoire
                                        </label>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Modifier</button>
                                        <a class="btn btn-danger" href="{{ route('admin.attributes.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Retourner</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="values">
                    <attribute-values :attributeid="{{ $attribute->id }}"></attribute-values>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ mix('backend/js/app.js') }}"></script>
@endpush
