<?php

namespace App\Http\Controllers;

use App\Models\membreFamille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\remboursement;
class RemboursementController extends Controller
{
  public function ajout_remboursement_view(){

    $membres=membreFamille::where('assurer_id','=',auth::user()->id)->get(); 
return view('ajout_remboursement',compact('membres')); }



public function store(Request $request)
{
  if($request->type=="pour_moi"){
    if($request->file('piece_jointe')<>null){
  $file = $request->file('piece_jointe'); 
  $fileName = time() . '_' . $file->getClientOriginalName();
   $file->move(public_path('uploads/remboursement'), $fileName);
  }  } 
   if($request->type<>"pour_moi"){
    if($request->file('piece_jointe')<>null){
    $file = $request->file('piece_jointe_membre'); 
    $fileName = time() . '_' . $file->getClientOriginalName();
     $file->move(public_path('uploads/remboursement'), $fileName);
    }
    }
        

    $remboursement = new Remboursement();
    $remboursement->id_membre = ($request->type == "pour_moi") ? NULL : $request->input('id_membre');
    $remboursement->nom_prestataire = $request->input('nom_prestataire');
    $remboursement->date_service = ($request->type == "pour_moi") ? $request->input('date_service') : $request->input('date_service_membre');
    $remboursement->medecin = ($request->type == "pour_moi") ? $request->input('medecin') : $request->input('medecin_membre');
    $remboursement->montant = ($request->type == "pour_moi") ? $request->input('montant') : $request->input('montant_membre');
    if($request->file('piece_jointe')<>null){
    $remboursement->piece_jointe = $fileName;
  }
    $remboursement->assurer_id= Auth::user()->id;

    $remboursement->montant_total = ($request->type == "pour_moi") ? $request->input('montant_total') : $request->input('montant_total_membre');

    $remboursement->save();
 
    return redirect('list_remboursements')->with('success', 'Remboursement enregistré avec succès');
}

public function liste(){

$remboursement=remboursement::where("assurer_id","=",Auth::user()->id)->get();
return view("Mes_remboursements",compact('remboursement'));
}


public function liste_assureur(){

  $remboursement=remboursement::all();
  return view("list_remboursement",compact('remboursement'));
  }
}
