<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginController::getLoggedUser();
    }

    public function create(Request $r) {
        if($this->loggedUser == false) {
            return redirect()->route("auth.showLogin");
        }

        $user_id = $this->loggedUser->getAuthIdentifier();
        $cep = $r->post("cep", false);
        $bairro = $r->post("bairro", false);
        $rua = $r->post("rua", false);
        $numero = $r->post("numero", false);

        if($user_id && $cep && $bairro && $rua && $numero) {
            
        }
    }

    public function delete(Request $r) {
        if($this->loggedUser == false) {
            return redirect()->route("auth.showLogin");
        }

        $id = $r->get("id", false);
        
        if($id) {
            // Deleta o endereço
        }
        

        return redirect()->back();
    }

    public function edit(Request $r) {
        if($this->loggedUser == false) {
            return redirect()->route("auth.showLogin");
        }

        $id = $r->get("id", false);

        if($id) {
            // Retorna a view para editar o endereço
        }
    }
}
