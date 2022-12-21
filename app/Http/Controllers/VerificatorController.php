<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class VerificatorController extends Controller
{
    public function init(Request $request){
        return response()->json($request->all());
    }

    public function info(Request $request){
        $tgt = $request->target;
        $path = public_path();

        try {
            $product = Product::where("barcode",$tgt)
                        ->with([ "prices" => fn($p) => $p->with("pricelist") ])
                        ->first();

            if($product){
                return response()->json([ "product"=> $product, "path"=>$path]);
            }else{ return response("$tgt not found!!", 404); }

        } catch (\Throwable $th) {
            return response()->json([ "error" => $th->getMessage() ], 500);
        }
    }
}
