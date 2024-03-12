@extends('theme')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item active" aria-current="page">Liste Remboursement</li>
                </ol>
            </nav>
            <div class="ms-panel">
                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table id="exemple3" class="table table-striped thead-primary w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                 

                                     <th>Membre Famille </th>
                                    <th>Nom Prestataire</th>
                            
                                    <th>Date de Service</th>
                                    <th>Médecin</th>
                                    <th>Montant</th>
                                    <th>Montant Total</th>
                                    <th>Status</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($remboursement as $remboursementItem)
                                    <tr>
                                        <td>{{ $remboursementItem->id }}</td>
                                        @if($remboursementItem->id_membre !== null)  
                                        <td> 
                                         {{$remboursementItem->membreFamille->nomPrenom}}
                                        </td>
                                    <td>
                                        {{ $remboursementItem->nom_prestataire }}</td> 
                                       @else
                                       <td># </td>
                                       <td># </td>

                                    @endif
                                            
                                            
                                        <td>{{ $remboursementItem->date_service }}</td>
                                        <td>{{ $remboursementItem->medecin }}</td>
                                        <td>{{ $remboursementItem->montant }}</td>
                                        <td>{{ $remboursementItem->montant_total }}</td>
                                        <td>{{ $remboursementItem->status }}</td>

                                        <td>
                                            <a href="#">
                                                <i class="fas fa-pencil-alt ms-text-primary"></i>
                                            </a>
                                            <a href="">
                                                <i class="far fa-trash-alt ms-text-danger"></i>
                                            </a>
                                          
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
