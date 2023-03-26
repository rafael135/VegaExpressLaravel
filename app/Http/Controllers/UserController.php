<?php

namespace App\Http\Controllers;

use App\Models\User;
use Directory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\FileInfo;
use SplFileInfo;

use function PHPUnit\Framework\directoryExists;

class UserController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginController::getLoggedUser();
    }

    public function showConfig(Request $r) {
        if($this->loggedUser == false) {
            return redirect()->route("home");
        }

        $menuOpt = $r->get("menuOption", false);

        return view("userConfig", ["loggedUser" => $this->loggedUser, "menuOption" => $menuOpt]);
    }

    public function showProfile(Request $r) {
        if($this->loggedUser == false) {
            return redirect()->route("home");
        }

        return view("userProfile", ["loggedUser" => $this->loggedUser, "menuOption" => "profile"]);
    }

    public function showUserProducts(Request $r) {
        if($this->loggedUser == false) {
            return redirect()->route("auth.showLogin", ["loggedUser" => $this->loggedUser]);
        }

        $user = Auth::user();

        $products = $user->products;

        return view("userProducts", ["loggedUser" => $this->loggedUser ,"produtos" => $products]);
    }

    public function getUserProducts(Request $r) {
        $id = $r->id;

        if($id == null) {
            return false;
        }

        $user = User::find($id);
        
        if($user != false) {
            $products = $user->products;
            return $products;
        } else {
            return false;
        }
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


    public function updateAvatar(Request $r) {
        $avatar = $r->file("avatar", false);

        if($avatar) {
            $idUser = $this->loggedUser->id;
            $user = User::find($idUser);

            $valid = in_array($avatar->extension(), ["png", "jpg", "jpeg"]);

            $savePath = "public/users/$idUser";

            
            
            if($valid == true) {
                if(Storage::disk("public")->exists($user->avatar)) {
                    Storage::disk("public")->delete($user->avatar);
                }

                $path = "";
                
                if(directoryExists($savePath)) {
                    $avatar->storeAs($savePath, "avatar." . $avatar->getClientOriginalExtension());
                } else {
                    mkdir($savePath, 0755, true);
                    $avatar->storeAs($savePath, "avatar." . $avatar->getClientOriginalExtension());
                }

                $path = "users/$idUser/avatar." . $avatar->getClientOriginalExtension();

                
                
                
    
                $user->avatar = $path;
                $user->save();
                return ["success" => true];
            } else {
                return ["success" => false, "error" => "Formato inválido!"];
            }
        }
    }
}
