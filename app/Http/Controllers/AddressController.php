<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
            $valid = true;
            $errors = [];

            if(strlen($cep) != 9) {
                $errors[count($errors)] = [
                    "input" => "cep",
                    "error" => "CEP inválido!"
                ];
                $valid = false;
            }

            $cep = intval(str_replace("-", "", $cep));
            //return ["echo" => $cep];

            if($cep == 0) {
                $errors[count($errors)] = [
                    "input" => "cep",
                    "error" => "CEP inválido!"
                ];
                $valid = false;
            }

            $numero = intval($numero);

            if($numero == 0) {
                $errors[count($errors)] = [
                    "input" => "numero",
                    "error" => "Número inválido!"
                ];
                $valid = false;
            }


            if($valid == true) {
                $res = Address::create([
                    "user_id" => $user_id,
                    "cep" => $cep,
                    "bairro" => $bairro,
                    "rua" => $rua,
                    "numero" => $numero
                ]);

                return ["success" => $res];
            } else {
                return ["success" => false, "errors" => $errors];
            }
        } else {
            return ["success" => false, "errors" => "Todos os campos devem ser preenchidos!"];
        }
    }

    public function delete(Request $r) {
        if($this->loggedUser == false) {
            return redirect()->route("auth.showLogin");
        }
        
        //$id = $r->input("id", false);
        $id = Route::current()->parameter("id");

        $id = ($id == null) ? false : $id;
        
        if($id) {
            $address = Address::find($id);
            $address->forceDelete();
        }
        

        return redirect()->back();
    }

    public function edit(Request $r) {
        if($this->loggedUser == false) {
            return redirect()->route("auth.showLogin");
        }

        $id = Route::current()->parameter("id", false);
        $userId = $this->loggedUser->id;

        if($id) {
            $address = Address::find($id);
            if($address != null) {
                if($address->user_id == $userId) {
                    return view("userAddressEdit", ["loggedUser" => $this->loggedUser, "address" => $address]);
                } else {
                    return redirect()->route("user.config");
                }
            }
            // Retorna a view para editar o endereço
        }
    }

    public function edit_action(Request $r) {
        
    }
}
