@php
    $errors = Session::get('error');
    $messages = Session::get('success');
    $info = Session::get('info');
    $warnings = Session::get('warning');
@endphp
@if ($errors) @foreach($errors as $key => $value)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <strong>Erreur!</strong> {{ $value }}
    </div>
@endforeach @endif

@if ($messages) @foreach($messages as $key => $value)
    <div class="alert alert-success alert-dismissible" role="alert">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <strong>Succès!</strong> {{ $value }}
    </div>
@endforeach @endif

@if ($info) @foreach($info as $key => $value)
    <div class="alert alert-info alert-dismissible" role="alert">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <strong>Info!</strong> {{ $value }}
    </div>
@endforeach @endif

@if ($warnings) @foreach($warnings as $key => $value)
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <strong>Avertissement!</strong> {{ $value }}
    </div>
@endforeach @endif
