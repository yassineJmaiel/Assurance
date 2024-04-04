@extends('theme')

@section('content')
<div class="ms-content-wrapper">
    <!-- Formulaire de mise à jour de l'assuré -->
    <form action="{{ route('assureurs.update', $assure->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Champ pour le nom et prénom -->
        <div class="form-group">
            <label for="nomPrenom">Nom et Prénom</label>
            <input type="text" class="form-control" id="nomPrenom" name="nomPrenom" value="{{ $assure->nomPrenom }}">
        </div>

        <!-- Champ pour la date de naissance -->
        <div class="form-group">
            <label for="dateNaissance">Date de Naissance</label>
            <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" value="{{ $assure->dateNaissance }}">
        </div>

        <!-- Champ pour l'email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $assure->email }}">
        </div>

        <!-- Champ pour le téléphone -->
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $assure->telephone }}">
        </div>

        <!-- Champ pour l'adresse -->
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $assure->adresse }}">
        </div>

        <!-- Champ pour le CIN -->
        <div class="form-group">
            <label for="cin">CIN</label>
            <input type="text" class="form-control" id="cin" name="cin" value="{{ $assure->cin }}">
        </div>

        <!-- Champ pour la situation -->
        <div class="form-group">
            <label for="situation">Situation</label>
            <input type="text" class="form-control" id="situation" name="situation" value="{{ $assure->situation }}">
        </div>

        <!-- Champ pour le genre -->
        <div class="form-group">
            <label for="genre">Genre</label>
            <select class="form-control" id="genre" name="genre">
                <option value="Homme" {{ $assure->genre == 'Homme' ? 'selected' : '' }}>Homme</option>
                <option value="Femme" {{ $assure->genre == 'Femme' ? 'selected' : '' }}>Femme</option>
            </select>
        </div>

        <!-- Champ pour le type d'assurance -->
        <div class="form-group">
            <label for="typeAssurance">Type d'Assurance</label>
            <input type="text" class="form-control" id="typeAssurance" name="typeAssurance" value="{{ $assure->typeAssurance }}">
        </div>

        <!-- Champ pour le numéro de contrat -->
        <div class="form-group">
            <label for="numeroContrat">Numéro de Contrat</label>
            <input type="text" class="form-control" id="numeroContrat" name="numeroContrat" value="{{ $assure->numeroContrat }}">
        </div>

        <!-- Champ pour la date de début de contrat -->
        <div class="form-group">
            <label for="dateDebutContrat">Date de Début de Contrat</label>
            <input type="date" class="form-control" id="dateDebutContrat" name="dateDebutContrat" value="{{ $assure->dateDebutContrat }}">
        </div>

        <!-- Champ pour la date de fin de contrat -->
        <div class="form-group">
            <label for="dateFinContrat">Date de Fin de Contrat</label>
            <input type="date" class="form-control" id="dateFinContrat" name="dateFinContrat" value="{{ $assure->dateFinContrat }}">
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection


