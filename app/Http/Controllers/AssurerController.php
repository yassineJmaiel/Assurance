<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\donnéesAssurer;
use App\Models\assurer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\patient;
use Illuminate\Support\Str;
class AssurerController extends Controller
{
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|confirmed',
            
        ]);

        $user =user::find(Auth::user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'mot de passe actuel incorrecte.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success','mot de passe changé  avec succés');
    }


    public function importPatients(Request $request)
    {
        ini_set("auto_detect_line_endings", true);
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);
        $csvFile = $request->file('csv_file');
        $file = fopen($csvFile->getPathname(), 'r');
        $header = fgetcsv($file);
        while (($data = fgetcsv($file)) !== false) {
            $patientData = array_combine($header, $data);
            $datedebut = date_create_from_format('d/m/Y', $patientData['dateDebutContrat']);
            $datefin = date_create_from_format('d/m/Y', $patientData['dateFinContrat']);
            $dob= date_create_from_format('d/m/Y', $patientData['dateNaissance']);



            $email_exists = DB::table('assurers')->where('email', $patientData['email'])->exists();
                
                        if (!$email_exists) {
                            $patient=new assurer();
                           $patient->nomPrenom = $patientData['nomPrenom'];
                            $patient->dateNaissance =  $dob;
                            $patient->email = $patientData['email'];
                            $patient->telephone = $patientData['telephone'];
                            $patient->adresse = $patientData['adresse'] ;
                            $patient->cin = $patientData['cin']; 
                            $patient->situation = $patientData['situation'];
                            $patient->genre = $patientData['genre'];
                            $patient->typeAssurance = $patientData['TypeAssurance'];
                            $patient->numeroContrat = $patientData['numeroContrat'] ;
                            $patient->dateDebutContrat = $datedebut;
                            $patient->dateFinContrat = $datefin;
                            $patient->assureur_id=auth::user()->id;
                             $patient->save();
                            $user = new User;
                            $password = Str::random(8);
                            $user->name = $patientData['nomPrenom'] ;
                            $user->email = $patientData['email'];
                            $user->typeAssurance = $patient->typeAssurance;

                            $user->password = bcrypt($password);
                            $user->role= "Assuré"; 
                            $user->save();

                            Mail::to($user->email)->send(new donnéesAssurer($user, $password));
                        }else{
                            return redirect()->back()->with('error', 'il ya des emails deja Liés a des comptes.');

                        }

        }
        fclose($file);
        return redirect()->back()->with('success', ' Les assurés ont été importés avec succès.');
    
        
        
}

public function showPatients()
{
    $patients = assurer::all();

    return view('listeassurer', compact('patients'));
}

public function delete($id){

    $membre=assurer::find($id);
    $user=User::where('email',$membre->email)->first();
    

    $membre->delete();
    $user->delete();

    return redirect()->back()->with('success', 'Asssuré supprimé avec succés !');;
  }

  public function edit($id)
  {
      $assure = Assurer::findOrFail($id);
      return view('editAssure', compact('assure'));
  }
  public function update(Request $request, $id)
  {
      $assure = Assurer::findOrFail($id);
     
  
      // Mettre à jour les informations de l'assuré
     
      $assure->nomPrenom = $request->input('nomPrenom');
      $assure->dateNaissance = $request->input('dateNaissance');
      $assure->email = $request->input('email');
      $assure->telephone = $request->input('telephone');
      $assure->adresse = $request->input('adresse');
      $assure->cin = $request->input('cin');
      $assure->situation = $request->input('situation');
      $assure->genre = $request->input('genre');
      $assure->numeroContrat = $request->input('numeroContrat');
      $assure->dateDebutContrat = $request->input('dateDebutContrat');
      $assure->dateFinContrat = $request->input('dateFinContrat');
  
      // Vérifiez si le champ 'typeAssurance' est fourni dans la requête
      if ($request->has('typeAssurance')) {
          $assure->typeAssurance = $request->input('typeAssurance');
      }
      $assure->save();
  
      return redirect()->route('listeassurer')->with('success', 'Informations de l\'assuré mises à jour avec succès.');
  }
    

}
