<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = false;
    }

    #Métodos_de_chamada_de_API() {
    public function insert(Request $r) {
        $title = $r->post("title", false);
        $description = $r->post("description", false);
        $price = $r->post("price", false);
        $author_id = $r->post("author_id", false);

        if($title && $description && $price && $author_id) {
            $newProduct = new Product();

            $newProduct->setAttribute("title", $title);
            $newProduct->setAttribute("description", $description);
            $newProduct->setAttribute("price", $price);
            $newProduct->setAttribute("author_id", $author_id);

            $res = $newProduct->save();

            return ["success" => $res];
        } else {
            return ["success" => false];
        }
    }

    # }


    public function getProduct(Request $r) {
        $id = $r->get("id", null);

        if($id == null) {
            return view("home", ["loggedUser" => $this->loggedUser]);
        }
    }

    public function getUserProducts(Request $r) {

    }

    public function search(Request $r) {
        $searchTerm = $r->get("search", null);
        $orderDate = $r->get("OrderDate", null);
        $qteItems = $r->get("qteItems", null);
        $pagina = $r->get("pagina", null);

        $searchTerm = ($searchTerm == null || $searchTerm == "") ? false : $searchTerm;
        $orderDate = ($orderDate == null) ? false : $orderDate;
        $qteItems = ($qteItems == null) ? false : $qteItems;
        $pagina = ($pagina == null) ? 0 : $pagina;

        $offset = 0;

        if ($pagina == 0) {
            $offset = 0;
        } else {
            $offset = $pagina * $qteItems;
        }

        if($searchTerm == false) {
            return view("home", ["loggedUser" => $this->loggedUser]);
        }

        $products = [];

        if($orderDate != "asc" || $orderDate != "desc") {
            $products = DB::table("products")->where("title", "like", "%$searchTerm%")
                ->offset($offset)
                ->limit($qteItems)
            ->get();
        } else {
            $products = DB::table("products")->where("title", "like", "%$searchTerm%")
                ->orderBy("updated_at", $orderDate)
                ->offset($offset)
                ->limit($qteItems)
            ->get();
        }

        $products = $products->all();

        

        $data = [
            "searchTerm" => $searchTerm,
            "orderDate" => $orderDate,
            "qteItems" => $qteItems,
            "pagina" => $pagina,
            "products" => $products,
            "loggedUser" => $this->loggedUser
        ];

        return view("search", $data);
    }
}