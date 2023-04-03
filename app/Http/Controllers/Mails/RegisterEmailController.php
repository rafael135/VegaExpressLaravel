<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Jobs\SendEmailVerification;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RegisterEmailController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginController::getLoggedUser();
    }

    public function send(Request $r) {
        if($this->loggedUser == false) {
            return ["success" => false];
        }

        $user = User::find($this->loggedUser->getAuthIdentifier());
        
        // 'dispatch' => Metodo que inicia o Job(Trabalho) com os argumentos passados
        SendEmailVerification::dispatch($user);

        //$registerEmail = new RegisterEmail($this->loggedUser);



        //try{
        //    Mail::to($this->loggedUser->email)->queue($registerEmail);
        //}catch(Exception $ex) {
        //    return ["success" => false];
        //}
        
        return ["success" => true];
    }


    public function check(Request $r) {
        if($this->loggedUser == false) {
            return redirect()->route("auth.showLogin");
        }

        $token = Route::current()->parameter("token");

        if($token == null) {
            // Retorno para a rota 'home' com uma mensagem de erro
            return redirect()->route("home");
        }

        $loggedUser = User::find($this->loggedUser->getAuthIdentifier());

        if($loggedUser->token == $token) {
            $loggedUser->email_verified = true;
            $loggedUser->save();

            // Envio para a rota 'home' com uma mensagem de sucesso
            return redirect()->route("home");
        } else {
            // Envio para a rota 'home' com uma mensagem de erro
            return redirect()->route("home");
        }
    }
}
