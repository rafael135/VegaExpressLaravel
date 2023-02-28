<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public static function getLoggedUser() {
        if(Auth::check()) {
            return Auth::user();
        } else {
            return false;
        }
    }

    // Metodos para mostrar a view de registro e login
    public function showLogin() {
        if(self::getLoggedUser() == false) {
            return view("login", ["loggedUser" => self::getLoggedUser(), "errors" => false]);
        }
    }

    public function showRegister() {
        if(self::getLoggedUser() == false) {
            return view("register", ["loggedUser" => self::getLoggedUser(), "errors" => false]);
        }
    }
    /////////////////////////////////////////////////////////////////////
    
    // Metodos de API para registro e login de usuarios
    public function login(Request $r) {
        $errors = [];

        $remember = $r->post("remember", false);
        $email = $r->post("email", false);
        $password = $r->post("password", false);

        if($email && $password) {
            
            $remember = ($remember != false && $remember != "false") ? true : false;
            $validLogin = true;

            if(filter_var($email, FILTER_VALIDATE_EMAIL) != true) {
                $errors[count($errors)] = [
                    "input" => "email",
                    "error" => "Formato de E-mail inválido!"
                ];
                $validLogin = false;
            }

            if(count($password) == 0) {
                $errors[count($errors)] = [
                    "input" => "password",
                    "error" => "Campo de Senha não preenchido!"
                ];
                $validLogin = false;
            } else if(count($password) < 8) {
                $errors[count($errors)] = [
                    "input" => "password",
                    "error" => "A senha deve ter no mínimo 8 caracteres!"
                ];
                $validLogin = false;
            }
            
            if($validLogin == true) {
            

                // 'exists' => Retorna verdadeiro ou falso se houve algum resultado do BD
                // 'all' => Retorna todos os items de uma consulta no BD
                //$emailExists = DB::table('users')->where("email", "=", $email)->get()->all();

                if(Auth::attempt(["email" => $email, "password" => $password], $remember)) {
                    $r->session()->regenerate();
                    
                    $loggedUser = Auth::user();

                    return view("home", ["loggedUser" => $loggedUser]);
                    // AJAX: return true;
                } else {
                    return view("login", ["loggedUser" => false, "emailInfo" => "O e-mail informado não existe!"]);
                    // AJAX: return ["emailInfo" => "O e-mail informado não existe!"];
                }
            } else {
                return view("login", ["loggedUser" => self::getLoggedUser(), "errors" => $errors]);
                // AJAX: return $errors;
            }
        }
        
    }

    public function register(Request $r) {
        $errors = [];

        $name = $r->post("name", false);
        $email = $r->post("email", false);
        $cpf = $r->post("cpf", false);
        $password = $r->post("password", false);

        $validRegister = true;


        if(count($name) == 0) {
            $errors[count($errors)] = [
                "input" => "name",
                "error" => "Campo de Nome não preenchido!"
            ];
            $validRegister = false;
        }


        if(count($cpf) == 0) {
            $errors[count($errors)] = [
                "input" => "cpf",
                "error" => "Campo de CPF não preenchido!"
            ];
            $validRegister = false;
        } else if(count($cpf) <> 11){
            $errors[count($errors)] = [
                "input" => "cpf",
                "error" => "CPF deve ter 11 caracteres!"
            ];
            $validRegister = false;
        } else if(is_numeric($cpf) != true) {
            $errors[count($errors)] = [
                "input" => "cpf",
                "error" => "CPF inválido!"
            ];
            $validRegister = false;
        }

        
        if(count($email) == 0) {
            $errors[count($errors)] = [
                "input" => "email",
                "error" => "Campo de E-mail não preenchido!"
            ];
            $validRegister = false;
        } else if(filter_var($email, FILTER_VALIDATE_EMAIL) != true) {
            $errors[count($errors)] = [
                "input" => "email",
                "error" => "E-mail inválido!"
            ];
            $validRegister = false;
        } else {
            if(DB::table("users")->where("email", "=", $email)->exists() == true) {
                $errors[count($errors)] = [
                    "input" => "email",
                    "error" => "O E-mail informado já esta sendo utilizado!"
                ];
                $validRegister = false;
            }
        }

        
        if(count($password) == 0) {
            $errors[count($errors)] = [
                "input" => "password",
                "error" => "Campo de Senha não preenchido!"
            ];
            $validRegister = false;
        } else if(count($password) < 8) {
            $errors[count($errors)] = [
                "input" => "password",
                "error" => "A senha deve ter no mínimo 8 caracteres!"
            ];
            $validRegister = false;
        }

        


        if($validRegister == true) {
            $newUser = new User([
                "name" => $name,
                "email" => $email,
                "cpf" => $cpf,
                "password" => $password
            ]);

            $res = $newUser->save();
            
            

            if($res == true) {
                Auth::login($newUser);
                return view("home", ["loggedUser" => self::getLoggedUser()]);
                // AJAX: return true;
            } else {
                return view("register", ["loggedUser" => self::getLoggedUser(), "errors" => true]);
                // AJAX: return false;
            }
        } else {
            return view("register", ["loggedUser" => self::getLoggedUser(), "errors" => $errors]);
            // AJAX: return $errors;
        }



    }
    ///////////////////////////////////////////////////////////////////////////////////////
}
