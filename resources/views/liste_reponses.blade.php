@extends('theme')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item active" aria-current="page">Liste  REPONSES </li>
                </ol>
            </nav>
            <div class="ms-panel">
                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table id="exemple4" class="table table-striped thead-primary w-100">
                            <thead>
                                <tr>
                                    <th>ID Demande</th>
                                 

                                     <th>Statut</th>
                                     
                                    <th>Commentaire</th>
                            <th> date/Heure de traitement </th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reponses as $reponse)
                                    <tr>
                                       <td> {{$reponse->id}}</td>
                                       <td>@switch($reponse->status)
                                        @case('Accepté')
                                            <button type="button" class="btn btn-success"style="margin-top: 0rem">Accepté</button>
                                            @break
                                
                                        @default
                                            <button type="button" class="btn btn-danger" style="margin-top: 0rem">Refusé</button>
                                    @endswitch</td>

                                       <td>@if($reponse->commentaire=="") 
                                        pas de commentaire
                                        @else
                                        {{$reponse->commentaire}}
                                    @endif</td>
                                       <td>{{$reponse->created_at}} </td>
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
