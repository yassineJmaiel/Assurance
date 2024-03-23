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
    public function handle()
    {
        $botman = app('botman');
   
        $botman->hears('{message}', function($botman, $message) {
   
            if ($message == 'hi') {
                $this->askName($botman);
            }elseif($message == 'how to change password') {
                $this->askpassword($botman);
                
            } else{
                $botman->reply("i dont understand you ");
            }


            
            
        });
   
        $botman->listen();
    }
   
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
   
            $name = $answer->getText();
   
            $this->say('Nice to meet you '.$name);
        });
    }

    public function askpassword($botman)
    {
        $botman->ask('you want to learn how to change passowrd ??', function(Answer $answer) {
   
            if( $answer->getText()=="yes"){;
   
            $this->say('step 1 go to profile  , step 2 : change password ');
             } else{
                $this->say('i dont undertsand you ');

             }
        });
    }



    
}