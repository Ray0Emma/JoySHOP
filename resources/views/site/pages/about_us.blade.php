@extends('site.app')
@section('title', 'Qui Somme Nous')
@section('content')
<div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end mb-4" >
             <h1 class="text-uppercase  font-weight-bold">À Propos De Nous</h1>
            <hr class="divider my-4" />
        </div>

    </div>
</div>

{!!config('settings.about_us') !!}
@stop
