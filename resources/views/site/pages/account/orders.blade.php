@extends('site.app')
@section('title', 'Orders')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Mon compte - Commandes</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                          @if(sizeof($orders) != 0)
                            <tr>
                                <th scope="col">N ° de commande</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom </th>
                                <th scope="col">Date </th>
                                <th scope="col">Montant (avec frais livraison)</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Statut</th>
                            </tr>
                          @endif
                        </thead>
                        <tbody>
                            {{-- {{dd($orders)}} --}}
                            @forelse ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->order_number }}</th>
                                    <td>{{ $order->first_name }}</td>
                                    <td>{{ $order->last_name }}</td>
                                    <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                    <td>{{ round($order->grand_total+config('settings.shipping'), 2) }} {{ config('settings.currency_symbol') }}</td>
                                    <td>{{ $order->item_count }}</td>
                                    <td><span class="badge badge-success">{{ strtoupper($order->status) }}</span></td>
                                </tr>
                            @empty
                                <div class="col-sm-12">
                                    <p class="alert alert-warning">Aucune commande à afficher.</p>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@stop
{{-- @push('scripts')
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
                            "lengthMenu":     "Afficher_MENU_ ",
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
@endpush --}}
