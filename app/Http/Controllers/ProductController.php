<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginController::getLoggedUser();
    }

    // Metodos para chamadas de API
    public function insert(Request $r) {
        $title = $r->post("title", false);
        $description = $r->post("description", false);
        $price = $r->post("price", false);
        $imgs = $r->post("imgs", false);
        $author_id = $r->post("author_id", false);

        if($title && $description && $price && $author_id) {
            $res = Product::create([
                "title" => $title,
                "description" => $description,
                "price" => $price,
                "imgs" => " ",
                "author_id" => $author_id
            ]);

            return ["success" => $res];
        } else {
            return ["success" => false];
        }
    }
    
    


    public function getProduct(Request $r) {
        $id = $r->id;

        if($id != null) {
            $produto = Product::find($id);

            return view("product", ["loggedUser" => LoginController::getLoggedUser(), "produto" => $produto]);
        } else {
            return redirect()->back();
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
            return redirect()->back();
        }

        $products = [];

        $maxProducts = 0;

        if($orderDate != "asc" || $orderDate != "desc") {
            $products = DB::table("products")
                ->where("title", "like", "%$searchTerm%")
                ->offset($offset)
                ->limit($qteItems)
            ->get();

            $maxProducts = DB::table('products')
                ->where("title", "like", "%$searchTerm%")
            ->get();
        } else {
            $products = DB::table("products")
                ->where("title", "like", "%$searchTerm%")
                ->orderBy("updated_at", $orderDate)
                ->offset($offset)
                ->limit($qteItems)
            ->get();

            $maxProducts = DB::table('products')
                ->where("title", "like", "%$searchTerm%")
                ->orderBy("updated_at" . $orderDate)
            ->get();
        }
        $maxPaginas = floor($maxProducts->count() / floatval($qteItems));
        $products = $products->all();

        
        

        $data = [
            "searchTerm" => $searchTerm,
            "orderDate" => $orderDate,
            "qteItems" => $qteItems,
            "pagina" => $pagina,
            "maxPaginas" => $maxPaginas,
            "products" => $products,
            "loggedUser" => $this->loggedUser
        ];

        return view("search", $data);
    }

    public function showCreateProduct(Request $r) {
        if($this->loggedUser != false) {
            return view("createProduct", ["loggedUser" => $this->loggedUser]);
        } else {
            return redirect()->route("auth.showLogin");
        }
    }
}