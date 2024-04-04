@extends('theme')


@section('content')


<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                  
                    <li class="breadcrumb-item active" aria-current="page">Liste des Assurés</li>
                </ol>
            </nav>
            <div class="ms-panel">
              
                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table id="exemple" class="table table-striped thead-primary w-100">
                            <thead>
                                <tr>
                                    <th>Nom Prénom</th>
                                    <th>Date de Naissance</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>CIN</th>
                                    <th>Situation</th>
                                    <th>Genre</th>
                                    <th>Type d'Assurance</th>
                                    <th>Numéro de Contrat</th>
                                    <th>Date de Début de Contrat</th>
                                    <th>Date de Fin de Contrat</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->nomPrenom }}</td>
                                        <td>{{ $patient->dateNaissance }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td>{{ $patient->telephone }}</td>
                                        <td>{{ $patient->adresse }}</td>
                                        <td>{{ $patient->cin }}</td>
                                        <td>{{ $patient->situation }}</td>
                                        <td>{{ $patient->genre }}</td>
                                        <td>{{ $patient->typeAssurance }}</td>
                                        <td>{{ $patient->numeroContrat }}</td>
                                        <td>{{ $patient->dateDebutContrat }}</td>
                                        <td>{{ $patient->dateFinContrat }}</td>
                                        <td>
                                            <a href="{{ route('assureurs.edit', $patient->id) }}"><i class="fas fa-pencil-alt ms-text-primary"></i></a> 
                                            <a href="/deleteAssuré/{{ $patient->id }}"><i class="far fa-trash-alt ms-text-danger"></i></a>
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



@endsection