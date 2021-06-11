@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary pull-right">Ajouter une Marque</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Nom </th>
                            <th> Slug </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->slug }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.brands.delete', $brand->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
        $('#sampleTable').DataTable( {
            responsive: true;
            "language": {
                            "decimal":        "",
                            "emptyTable":     "Aucune donnée disponible dans le tableau",
                            "info":           "Affichage de _START_ à _END_ entrées sur _TOTAL_",
                            "infoEmpty":      "Affichage de 0 à 0 sur 0 entrées",
                            "infoFiltered":   "(filtré à partir de _MAX_ entrées totales)",
                            "infoPostFix":    "",
                            "thousands":      ",",
                            "lengthMenu":     "Afficher les _MENU_ entrées ",
                            "loadingRecords": "Chargement...",
                            "processing":     "Traitement...",
                            "search":         "Rechercher:",
                            "zeroRecords":    "Aucun enregistrements correspondants trouvés",
                            "paginate": {
                                "first":      "Premier",
                                "last":       "dernier",
                                "next":       "Suivant",
                                "previous":   "Précédent"
                            },
                            "aria": {
                                "sortAscending":  ": activer pour trier les colonnes par ordre croissant",
                                "sortDescending": ": activer pour trier les colonnes par ordre décroissant"
                            }
                       }
                } );
        } );
    </script>
@endpush
