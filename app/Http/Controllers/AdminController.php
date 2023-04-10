<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function scan(Request $request){
        return response("Scan dir is working!!!");
    }
}
