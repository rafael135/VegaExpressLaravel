<?php

namespace App\Http\Controllers;

use App\Models\ProductEvaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginController::getLoggedUser();
    }

    public function insert(Request $r) {
        $product_id = $r->post("product_id", false);
        $evaluations_qnt = $r->post("evaluations_qnt", false);
        $total_grade = $r->post("total_grade", false);

        if($product_id && $evaluations_qnt && $total_grade) {
            $res = ProductEvaluation::create([
                "product_id" => $product_id,
                "evaluations_qnt" => $evaluations_qnt,
                "total_grade" => $total_grade
            ]);

            return $res;
        }
    }

    public function getEvaluationById(Request $r) {
        $id = $r->id;
        
        if($id != null) {
            $evaluation = ProductEvaluation::find($id);
            $evaluation["product"] = $evaluation->getProduct;

            return $evaluation;
        }
        
    }
}
