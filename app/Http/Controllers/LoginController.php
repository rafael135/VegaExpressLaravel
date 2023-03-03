<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

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
        } else {
            return view("home", ["loggedUser" => self::getLoggedUser()]);
        }
    }

    public function showRegister() {
        if(self::getLoggedUser() == false) {
            return view("register", ["loggedUser" => self::getLoggedUser(), "errors" => false]);
        } else {
            return view("home", ["loggedUser" => self::getLoggedUser()]);
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

            if(strlen($password) == 0) {
                $errors[count($errors)] = [
                    "input" => "password",
                    "error" => "Campo de Senha não preenchido!"
                ];
                $validLogin = false;
            } else if(strlen($password) < 8) {
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
                $r->session()->regenerate();

                if(Auth::attempt(["email" => $email, "password" => $password], $remember)) {
                    $loggedUser = Auth::user();

                    return view("home", ["loggedUser" => $loggedUser]);
                    // AJAX: return true;
                } else {
                    return view("login", ["loggedUser" => false, "emailInfo" => "O e-mail informado não existe!", "errors" => $errors]);
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

        $cpf = str_replace([".", "-"], "", $cpf);

        $validRegister = true;


        if(strlen($name) == 0) {
            $errors[count($errors)] = [
                "input" => "name",
                "error" => "Campo de Nome não preenchido!"
            ];
            $validRegister = false;
        }


        if(strlen($cpf) == 0) {
            $errors[count($errors)] = [
                "input" => "cpf",
                "error" => "Campo de CPF não preenchido!"
            ];
            $validRegister = false;
        } else if(strlen($cpf) <> 11){
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

        //dd(is_numeric($cpf));

        
        if(strlen($email) == 0) {
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

        
        if(strlen($password) == 0) {
            $errors[count($errors)] = [
                "input" => "password",
                "error" => "Campo de Senha não preenchido!"
            ];
            $validRegister = false;
        } else if(strlen($password) < 8) {
            $errors[count($errors)] = [
                "input" => "password",
                "error" => "A senha deve ter no mínimo 8 caracteres!"
            ];
            $validRegister = false;
        }

        


        if($validRegister == true) {
            $data = [
                "name" => $name,
                "email" => $email,
                "cpf" => $cpf,
                "password" => Hash::make($password),
                "token" => md5(time() . rand(0, 999) . time())
            ];

            User::create($data);

            $r->session()->regenerate();
            if(Auth::attempt(["email" => $email, "password" => $password], true)) {
                
                $loggedUser = Auth::user();

                return view("home", ["loggedUser" => $loggedUser]);
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

    public function logout(Request $r) {
        Auth::logout();
        Session::flush();
    
        return view("home", ["loggedUser" => self::getLoggedUser()]);
    }
    ///////////////////////////////////////////////////////////////////////////////////////
}
