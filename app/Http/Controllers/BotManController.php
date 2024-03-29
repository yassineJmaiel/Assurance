<?php
namespace App\Http\Controllers;
   
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
   
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
//     public function handle()
//     {
//         $botman = app('botman');
   
//         $botman->hears('{message}', function($botman, $message) {
   
//             if ($message == 'hi') {
//                 $this->askName($botman);
//             }elseif($message == 'Bonjour') {
//                 $this->askName($botman);
                
//             } else{
//                 $botman->reply("désolé je ne n'arrive pas a vous comprendre  ");
//             }


            
            
//         });
   
//         $botman->listen();
//     }
   
//     /**
//      * Place your BotMan logic here.
//      */
//     public function askName($botman)
// {
//     $botman->ask( 'Comment puis-je vous aider aujourd'hui?\nPour changer votre mot de passe, tapez 1.\nPour soumettre une demande de remboursement, tapez 2.\nPour consulter l'annuaire, tapez 3.\nPour ajouter un membre de la famille, tapez 4.', function(Answer $answer) use ($botman) {
//         $this->say($answer->getText()==1);
//     });
// }

//     public function askpassword($botman)
//     {
//         $botman->ask('Tu veux savoir comment changer votre mot de passe ?', function(Answer $answer) {
//             if ($answer->getText() == "oui") {
//                 $this->say('Etape 1 : cliquer sur profile, étape 2 : saisir les champs et cliquer enregistrer.');
//             } else {
//                 $this->say('Je ne comprends pas votre demande.');
//             }
//         });
//     }

public function handle()
{
    $botman = app('botman');

    $botman->hears('{message}', function($botman, $message) {
        if ($message == 'hi' || $message == 'bonjour') {
            $botman->reply("<br>Comment puis-je vous aider aujourd'hui?</br><br>Pour changer votre mot de passe, tapez 1.</br><br> Pour soumettre une demande de remboursement, tapez 2.</br><br>Pour consulter l'annuaire, tapez 3.</br><br>Pour ajouter un membre de la famille, tapez 4.</br>");
        } elseif ($message == '1') {
            $botman->reply("<br>Vous avez choisi de changer votre mot de passe.</br><br> Voici les étapes :</br> <br>Étape 1 : Cliquez sur votre profil </br><br>Étape 2 :  Suivez les instructions à l'écran.</br>");
        } elseif ($message == '2') {
            $botman->reply("<br>Vous avez choisi de soumettre une demande de remboursement. </br><br>Voici les étapes :</br> <br>Étape 1: cliquer sur remboursement</br><br> Étape 2 : Veuillez remplir les champs et joindre vos piéces jointes en cas de besoin </br><br> Étape 3 :Cliquer sur Submit</br><br>Étape 4 :En cas de faute veuillez cliquer sur Reset</br> ");
        } elseif ($message == '3') {
            $botman->reply("<br>Vous avez choisi de consulter l'annuaire.</br><br> Voici les étapes :</br> <br>Étape 1:Cliquer Annuaire puis consulter annuaire</br><br>Étape 2: Veuillez saisir dans la barre de recherche ce que vous cherchez : médecin, pharmacie, hôpital, etc. </br>");
        } elseif ($message == '4') {
            $botman->reply("<br>Vous avez choisi d'ajouter un membre de la famille.</br><br> Voici les étapes : <br>Étape 1:Cliquer sur ma famille</br><br> Étape 2:Cliquer Ajouter membre et remplir les champs </br><br>Étape 3 :Cliquer submit ou reset en cas de faute de saisie </br>  ");
        } else {
            $botman->reply("Désolé, je n'ai pas compris votre demande. Veuillez choisir parmi les options proposées.");
        }
    });

    $botman->listen();
}


    
}