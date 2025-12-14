<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VerificatorController extends Controller
{
    public function init(Request $request){
        $count = Product::count();
        return response()->json([ "serve8" => "Hello there!!", "products"=>$count ]);
    }

    public function info(Request $request){
        $tgt = $request->target;
        $path = public_path();

        try {
            $product = Product::where("barcode",$tgt)
            ->with([ "prices" => fn($p) => $p->with("pricelist"),
                'category.familia.seccion'
            ])
            ->first();
            if($product){
                $files = Storage::files("vhelpers/Products/$product->id");
                $product->media = collect($files)->map(fn ($file) => [
                    'type' => str_ends_with($file, '.mp4') ? 'video' : 'image',
                    'url' => Storage::disk('s3')->url($file),
                ]);
                return response()->json([ "product"=> $product, "path"=>$path]);
            }else{ return response("$tgt not found!!", 404); }

        } catch (\Throwable $th) {
            return response()->json([ "error" => $th->getMessage() ], 500);
        }
    }
}
