<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginController::getLoggedUser();
    }

    public function index() {
        return view("home", [
            "loggedUser" => $this->loggedUser
        ]);
    }
}
