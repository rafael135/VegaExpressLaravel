<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = false;
    }

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
}
