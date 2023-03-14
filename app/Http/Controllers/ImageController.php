<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginController::getLoggedUser();
    }

    public static function checkFormat($files) {
        $validExt = ["image/jpeg", "image/jpg", "image/png"];

        foreach($files as $file) {
            if(in_array($file["type"], $validExt) != true) {
                return false;
            }
        }

        return true;
    }



    public static function resizeFile($files) {
        
    }



    public static function uploadFile($files, $path) {
        $fileNames = [];

        for($i = 0; $i < count($files); $i++) {
            $extension = explode(".", $files[$i]["fileName"]);
            $extension = $extension[count($extension) - 1];

            $name = Storage::putFileAs($path, $files[$i], "$i." . $extension);
            if($name != false) {
                array_push($fileNames, $name);
            }
        }

        return $fileNames;
    }
}
