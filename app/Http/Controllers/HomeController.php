<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginController::getLoggedUser();
    }

    public function index() {
        $db = new DB();

        $lastProducts = $db::table("products")
            ->orderBy("created_at", "desc")
            ->limit(6)
        ->get();


        return view("home", [
            "loggedUser" => $this->loggedUser,
            "lastProducts" => $lastProducts
        ]);
    }
}
