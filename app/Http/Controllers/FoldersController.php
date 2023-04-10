<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoldersController extends Controller
{
    public function start(){
        $storage = Storage::disk('local')->put('example.txt', 'Este es el contenido de example');
        return response()->json($storage);
    }

    public function list(){
        chdir("../");
        $currentdir = getcwd();
        $contentdir = scandir(".");

        return response()->json([
            "msg"=>"Scanning...",
            "currentdir"=>$currentdir,
            "contentdir"=>$contentdir
        ]);
    }

    public function create(){
        return response("Creating...");
    }
}
