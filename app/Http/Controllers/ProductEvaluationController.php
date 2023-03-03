<?php

namespace App\Http\Controllers;

use App\Models\ProductEvaluation;
use Illuminate\Http\Request;

class ProductEvaluationController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginController::getLoggedUser();
    }

    public function getEvaluationById(Request $r) {
        $evaluation = ProductEvaluation::find($r->id);

        $evaluation["product"] = $evaluation->getProduct();

        return $evaluation;
    }
}
