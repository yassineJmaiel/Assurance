@extends('theme')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item active" aria-current="page">Liste membres</li>
                </ol>
            </nav>
            <div class="ms-panel">
                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table id="exemple4" class="table table-striped thead-primary w-100">
                            <thead>
                                <tr>
                                    <th>Nom et Prénom</th>
                                    <th>Date de Naissance</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>CIN</th>
                                    <th>Situation</th>
                                    <th>Relation</th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($membres as $membre)
                                    <tr>
                                        <td>{{ $membre->nomPrenom }}</td>
                                        <td>{{ $membre->dateNaissance }}</td>
                                        <td>{{ $membre->email }}</td>
                                        <td>{{ $membre->telephone }}</td>
                                        <td>{{ $membre->adresse }}</td>
                                        <td>{{ $membre->cin }}</td>
                                        <td>{{ $membre->situation }}</td>
                                        <td>{{ $membre->relation }}</td>
                                        <td> 
                                            <a href="/deletemembre/{{$membre->id}}"><i class="far fa-trash-alt ms-text-danger"></i></a>
                                            <a href="/edit_member/{{$membre->id}}"><i class="far fa-edit ms-text-primary"></i></a>

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
