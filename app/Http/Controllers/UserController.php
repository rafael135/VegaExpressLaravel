<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginController::getLoggedUser();
    }

    public function showUserProfile(Request $r) {
        
    }

    public function showUserProducts(Request $r) {
        if($this->loggedUser == false) {
            return redirect()->route("auth.showLogin", ["loggedUser" => $this->loggedUser]);
        }

        $user = Auth::user();

        $products = $user->products;

        return view("userProducts", ["loggedUser" => $this->loggedUser ,"produtos" => $products]);
    }

    /*
    public function insert(Request $r) {
        $name = $r->post("name", false);
        $email = $r->post("email", false);
        $password = $r->post("password", false);
        $cpf = $r->post("cpf", false);

        $newUser = new user();

        $newUser->setAttribute("name", $name);
        $newUser->setAttribute("email", $email);
        $newUser->setAttribute("password", $password);
        $newUser->setAttribute("cpf", $cpf);
        $newUser->setAttribute("token", md5(time() . rand(0, 999) . time()));

        $res = $newUser->save();

        return ["success" => $res];
    }
    */
}
