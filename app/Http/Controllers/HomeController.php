<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = false;
    }

    public function index() {
        return view("home", [
            "loggedUser" => $this->loggedUser
        ]);
    }
}
