@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i> {{ $pageTitle }}</h1>
        <p>{{ $subTitle }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th class="text-center"> Prénom </th>
                            <th class="text-center"> Nom </th>
                            <th class="text-center"> Email </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name}}</td>
                            <td>{{ $user->email}}</td>
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
        responsive: true,
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
