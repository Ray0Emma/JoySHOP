@extends('admin.app')
@section('title') Tableau de bord @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Tableau de bord </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <a href="{{ route('admin.users.index')}}" class="href">
                        <h4>Utilisateurs</h4>
                        <p><b>{{count($users)}}</b></p>
                    </a>
                </div>
            </div>
        </div>
         <div class="col-md-6 col-lg-6">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-bar-chart fa-3x"></i>
                <div class="info">
                    <a href="{{ route('admin.orders.index') }}" class="href">
                        <h4>Commandes</h4>
                        <p><b>{{count($orders)}}</b></p>
                    </a>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Téléchargements</h4>
                    <p><b>10</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Étoiles</h4>
                    <p><b>500</b></p>
                </div>
            </div>
        </div>
    </div>  --}}
@endsection
