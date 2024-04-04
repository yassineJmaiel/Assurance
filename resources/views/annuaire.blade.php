@extends('theme')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 80%;
        margin: 30px auto 0; /* Ajout de la marge en haut, 20px */
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .container1 {
        width: 80%;
        margin: 30px auto 0;  /* Ajout de la marge en haut, 20px */
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        height: 350px;
    }
    form {
        text-align: center;
        margin: 20px 0;
    }
    input[type="text"] {
        padding: 10px;
        font-size: 1em;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 70%;
        max-width: 400px;
    }
    button {
        padding: 12px 24px; /* Ajustement de la taille du bouton */
        font-size: 1em;
        background-color: #4285f4;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    button:hover {
        background-color: #327ae8;
    }
    h2 {
        margin-top: 20px;
        color: #4285f4;
    }
    .ulhajer {
        list-style: none;
        padding: 0;
    }
    .lihajer {
        margin-bottom: 10px;
        background-color: #fff;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    p {
        text-align: left; /* Alignement du texte à gauche */
        margin-top: 20px;
    }
    .btn-primary {
        background-color: #4285f4;
        color: #fff;
        padding: 12px 24px; /* Ajustement de la taille du bouton */
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #327ae8;
    }
    .description {
        margin-top: 20px;
        display: flex; /* Utilisation de flexbox */
        align-items: center; /* Alignement vertical */
    }
    .description img {
        max-width: 30%; /* Ajustement de la taille de l'image */
        height: auto;
    }
    .description-text {
        flex: 1; /* Occupation de l'espace restant */
        padding-left: 20px;
        /* Espacement à gauche */
         padding-right: 40px;
    }
    .invite-text {
        text-align: center;
        margin-top: 20px;
        font-size: 1.1em; /* Ajustement de la taille du texte */
        color: #666; /* Couleur du texte */
    }
    .icon-container {
        display: flex;
        align-items: center;
        justify-content: center; /* Centre les icônes horizontalement */
        margin-top: 20px; /* Ajout de la marge en haut */
    }

    .icon-item {
        display: flex;
        align-items: center;
        margin: 0 10px;
    }

    .icon-item i {
        font-size: 24px;
        margin-right: 5px;
        color: #4285f4; /* Couleur bleue */
    }

    .icon-item span {
       
        color: #4285f4; /* Couleur bleue */
    }
</style>
<!--container n1-->
<div class="container1">
    <div class="description">
        <img src="https://th.bing.com/th/id/OIP.uGkQDt3Pm-QPUYuaw61E3gHaHa?rs=1&pid=ImgDetMain" alt="Image">
        <div class="description-text">
            <p><strong>Dawini.tn</strong> vous permet de trouver une pharmacie ouverte à proximité, où que vous soyez et à n’importe quel moment. Notre base de données est régulièrement mise à jour et contient plus de 2000 pharmacies, ainsi que tous les hôpitaux de Tunisie et 70 cliniques à travers tout le territoire. Pharmacies de garde, cliniques en Tunisie, hôpitaux les plus proches de vous.
            <strong>Profitez de l'efficacité de Dawini.tn pour trouver rapidement ce dont vous avez besoin en matière de santé.</strong></p>

            <div style="margin-top: 20px;">
                <a href="https://www.dawini.tn/" class="btn btn-primary">Aller à Dawini.tn</a>
            </div>
        </div>
    </div>

</div>

<!--container n2-->
<div class="container">
    <div class="icon-container">
        <div class="icon-item">
            <i class="fas fa-heart"></i> <span>Pharmacies</span>
        </div>
        <div class="icon-item">
            <i class="fas fa-user-md"></i> <span>Médecins</span>
        </div>
        <div class="icon-item">
            <i class="fas fa-pills"></i> <span>Médicaments</span>
        </div>
        <div class="icon-item">
            <i class="fas fa-hospital"></i> <span>Hôpitaux</span>
        </div>
    </div>
    <form action="/search" method="GET">
        <input placeholder="Rechercher" type="text" id="searchQuery" name="q" required>
        <button type="submit">Rechercher</button>
    </form>
    @if(isset($links) && count($links) > 0)
        <h2>Résultats de la recherche</h2>
        <ul class="ulhajer">
            @foreach($links as $link)
                <li class="lihajer"><a href="{{ strpos($link, 'http') === 0 ? $link : 'http://' . $link }}" target="_blank">{{ $link }}</a></li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
