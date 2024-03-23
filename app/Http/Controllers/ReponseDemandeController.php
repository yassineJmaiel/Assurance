<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\remboursement;
use Illuminate\Http\Request;
use App\Models\ReponseDemande;

class ReponseDemandeController extends Controller
{
    public function store(Request $request)
    {
        $reponseDemande = new ReponseDemande();
        $reponseDemande->remboursement_id = $request->remboursement_id;
        $reponseDemande->assurer_id = $request->assurer_id;

        $reponseDemande->status = $request->status;
        $reponseDemande->commentaire = $request->commentaire;
        $reponseDemande->save();
        $reboursement=remboursement::where("id", $reponseDemande->remboursement_id)->first();
        $reboursement->status=$request->status;
        $reboursement->save();

        return redirect()->back()->with('success', 'Reponse envoyé avec succés');
    }

    public function reponses(){
$reponses=ReponseDemande::where("assurer_id",auth::user()->id)->get();
return view('liste_reponses',compact('reponses'));

    }
}
