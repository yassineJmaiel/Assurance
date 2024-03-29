@extends('theme')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
         
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Modifier Membre Famille</h6>
                </div>
                <div class="ms-panel-body">
                    <form class="needs-validation" method="post" action="{{ route('update_membre', $membre->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom220">Nom et Prénom</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nomPrenom" value="{{ $membre->nomPrenom }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom001">Date de naissance</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="dateNaissance" value="{{ $membre->dateNaissance }}" required>
                                </div>
                            </div>
                        </div>
                        <!-- Ajoutez le reste des champs à modifier ici -->
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom2">Telephone</label>
                                <div class="input-group">
                                    <input type="tel" class="form-control"  name="telephone"   value="{{ $membre->telephone }}" required>

                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="validationCustom003">Adresse</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  name="adresse" value="{{ $membre->adresse }}"required>

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom004">Cin</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  name="cin" value="{{ $membre->cin }}" >

                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="validationCustom005">Situation</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  name="situation"  value="{{ $membre->situation }}"required>
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                           

                            <div class="col-md-6 mb-2">
                                <label>Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="email" value="{{ $membre->email}}"required>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Relation</label>
                                <input type="text" class="form-control" name="relation" value="{{ $membre->relation }}" required>

                            </div>

                        </div>

                        <div class="form-row">
                             <div class="col-md-6 mb-3">
                                <label for="validationCustom230">genre</label>
                                <div class="input-group">
                                    
                                    <ul class="ms-list d-flex">
                                        <li class="ms-list-item pl-0">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="genre" value="M">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> M </span>
                                        </li>
                                        <li class="ms-list-item">
                                            <label class="ms-checkbox-wrap">
                                            <input type="radio" name="genre" value="F" checked="">
                                            <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> F </span>
                                        </li>
                                    </ul>
                                </div>
                            </div> 
                           
                        </div>
                        <div class="form-row">
                            
                            <div class="col-md-6 mb-2">
                                <label>Numero Contrat</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="numeroContrat" value="{{$infos->numeroContrat}}" disabled>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Type Assurance</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="typeAssurance"  value="{{$infos->typeAssurance}}" disabled>

                                </div>
                            </div>
                        </div>
                       
                        <div class="form-row">
                          
                            <div class="col-md-6 mb-3">
                                <label >Date Debut Contrat</label>
                                <input type="text" class="form-control" name="dateDebutContrat"  value="{{$infos->dateDebutContrat}}" disabled>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label >Date Fin Contrat</label>
                                <input type="text" class="form-control" name="dateFinContrat" value="{{$infos->dateFinContrat}}" disabled>

                            </div>
                        </div>
                        <button class="btn btn-warning mt-4 d-inline w-20" type="reset">Reset</button>
                        <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
