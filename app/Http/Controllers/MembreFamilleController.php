<?php

namespace App\Http\Controllers;

use App\Models\assurer;
use App\Models\membreFamille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MembreFamilleController extends Controller
{

    public function ajout_membre_view(){

  $infos=assurer::where('email','=',auth::user()->email)->first();

  return view('add_member',compact('infos'));

    
}

public function ajout_membre(Request $request)
    {
        
        $membre = new membreFamille();

        $infos=assurer::where('email','=',auth::user()->email)->first();


        $membre->nomPrenom = $request->input('nomPrenom');
        $membre->dateNaissance = $request->input('dateNaissance');
        $membre->telephone = $request->input('telephone');
        $membre->adresse = $request->input('adresse');
        $membre->cin = $request->input('cin');
        $membre->situation = $request->input('situation');
        $membre->genre = $request->input('genre');
        $membre->email = $request->input('email');

        $membre->relation = $request->input('relation');
        $membre->numeroContrat = $infos->numeroContrat;
        $membre->typeAssurance = $infos->typeAssurance;
        $membre->dateDebutContrat = $infos->dateDebutContrat;
        $membre->dateFinContrat =$infos->dateFinContrat;
        $membre->assurer_id = $request->input('assurer_id');
        $membre->assureur_id = $request->input('assureur_id');

        $membre->save();
                return redirect()->back()->with('success', 'Membre ajouté avec succés !');
    }
}
