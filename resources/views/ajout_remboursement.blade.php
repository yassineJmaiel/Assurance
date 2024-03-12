@extends('theme')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6> Demande Remboursement</h6>
                </div>
                <div class="ms-panel-body">
                    <form  method="post" action="/add_remboursement" enctype="multipart/form-data">
                       @csrf
                        <div class="form-group">
                            <label for="radioPourMoi" class="mr-3">
                                <input type="radio" id="radioPourMoi" name="type" value="pour_moi" checked> Pour moi
                            </label>
                            @if(Auth::user()->typeAssurance<>"ASI")
                            <label for="radioMembreFamille">
                                <input type="radio" id="radioMembreFamille" name="type" value="membre_famille"> Membre Famille
                            </label>
                            @endif
                        </div>

                        <!-- Fields for "Pour moi" -->
                        <div id="pourMoiFields">
                            <div class="form-group">
                                <label for="dateServicePourMoi">Date de service</label>
                                <input type="date" class="form-control" id="dateServicePourMoi" name="date_service">
                            </div>
                            <div class="form-group">
                                <label for="medecinPourMoi">Médecin ou fournisseur de soins</label>
                                <input type="text" class="form-control" id="medecinPourMoi" name="medecin">
                            </div>
                            <div class="form-group">
                                <label for="montantPourMoi">Montant</label>
                                <input type="number" class="form-control" id="montantPourMoi" name="montant">
                            </div>
                            <div class="form-group">
                                <label for="montantTotalPourMoi">Montant total à rembourser</label>
                                <input type="text" class="form-control" id="montantTotalPourMoi" name="montant_total" >
                            </div>
                            <div class="form-group">
                                <label for="montantTotalMembreFamille">Piéce Jointe :</label>
                                <input type="file" class="form-control" id="piecePourMoi" name="piece_jointe" >
                            </div>
                        </div>

                        <!-- Fields for "Membre Famille" -->
                        <div id="membreFamilleFields" style="display:none;">
                            <div class="form-group">
                                <label for="nomPrestataire">Nom membre famille</label>
                                <select class="form-control"  name="id_membre">
                                    @foreach ($membres as $membre)
                                    <option value="id"> {{$membre->nomPrenom}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nomPrestataire">Nom du prestataire</label>
                                <input type="text" class="form-control" id="nomPrestataire" name="nom_prestataire">
                            </div>
                            <div class="form-group">
                                <label for="dateServiceMembreFamille">Date de service</label>
                                <input type="date" class="form-control" id="dateServiceMembreFamille" name="date_service_membre">
                            </div>
                            <div class="form-group">
                                <label for="medecinMembreFamille">Médecin ou fournisseur de soins</label>
                                <input type="text" class="form-control" id="medecinMembreFamille" name="medecin_membre">
                            </div>
                            <div class="form-group">
                                <label for="montantMembreFamille">Montant</label>
                                <input type="number" class="form-control" id="montantMembreFamille" name="montant_membre">
                            </div>
                            <div class="form-group">
                                <label for="montantTotalMembreFamille">Montant total</label>
                                <input type="text" class="form-control" id="montantTotalMembreFamille" name="montant_total_membre">
                            </div>
                            <div class="form-group">
                                <label for="montantTotalMembreFamille">Piéce Jointe :</label>
                                <input type="file" class="form-control" id="pieceMembreFamille" name="piece_jointe_membre">
                            </div>
                        </div>

                        <button class="btn btn-warning mt-4 d-inline w-20" type="reset">Reset</button>
                        <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const radioPourMoi = document.getElementById('radioPourMoi');
        const radioMembreFamille = document.getElementById('radioMembreFamille');
        const pourMoiFields = document.getElementById('pourMoiFields');
        const membreFamilleFields = document.getElementById('membreFamilleFields');

        radioPourMoi.addEventListener('change', function () {
            pourMoiFields.style.display = 'block';
            membreFamilleFields.style.display = 'none';
        });

        radioMembreFamille.addEventListener('change', function () {
            pourMoiFields.style.display = 'none';
            membreFamilleFields.style.display = 'block';
        });
    });
</script>

@endsection
