<?php

namespace App\Http\Controllers;

use App\Models\membreFamille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RemboursementController extends Controller
{
  public function ajout_remboursement_view(){

    $membres=membreFamille::where('assurer_id','=',auth::user()->id)->get(); 
return view('ajout_remboursement',compact('membres')); }
}
