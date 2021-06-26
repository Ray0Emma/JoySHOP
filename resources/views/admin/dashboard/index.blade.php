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
        <div class="col-md-6 col-lg-6">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <a href="{{ route('admin.categories.index') }}" class="href">
                        <h4>Catégories</h4>
                        <p><b>{{count($categories)}}</b></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-shopping-bag fa-3x"></i>
                <div class="info">
                    <a href="{{ route('admin.products.index') }}" class="href">
                        <h4>Produits</h4>
                        <p><b>{{count($products)}}</b></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
