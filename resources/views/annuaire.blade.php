@extends('theme')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
       
      }
    .container{
        margin-top: 50px;
            margin-bottom: 40px;
    }

    h3 {
        text-align: center;
        color: #4285f4;
       
    }

    form {
        text-align: center;
        margin: 20px 0;
    }

    label {
        font-size: 1.2em;
        margin-right: 10px;
    }

    input[type="text"] {
        padding: 8px;
        font-size: 1em;
    }

    button {
        padding: 8px 15px;
        font-size: 1em;
        background-color: #4285f4;
        color: #fff;
        border: none;
        cursor: pointer;
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
        text-align: center;
        margin-top: 20px;
    }
</style>
@section('content')



<body>
    <div class="container">
    <h3>Rechercher dans l'Annuaire</h3>

    <form action="/search" method="GET">
        {{-- <label for="searchQuery">Search:</label> --}}
        <input placeholder="Rechercher" type="text" id="searchQuery" name="q" required>
        <button type="submit">Rechercher</button>
    </form>

    @if(isset($links) && count($links) > 0)
    <h2>les resultats de Recherche</h2>
    <ul class="ulhajer">
        @foreach($links as $link)
            <li class="lihajer"><a href="{{ strpos($link, 'http') === 0 ? $link : 'http://' . $link }}" target="_blank">{{ $link }}</a></li>
        @endforeach
    </ul>
    
    
   
    @endif
    </div>
</body>

@endsection
