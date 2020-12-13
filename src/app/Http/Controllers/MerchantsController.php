<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Merchant;
use App\Product;
use Str;

class MerchantsController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'udid' => ['required', 'string', 'max:255', 'unique:merchants'],
            'phoneModel' => ['required', 'string', 'max:255'],
            'osVersion' => ['required', 'string', 'max:255'],
            'platform' => ['required', 'string', 'max:255'],
            'appVersion' => ['required', 'string', 'max:255']
        ]);

        $merchant = new Merchant;

        $merchant->key = "SBIT_" . Str::random(15);
        $merchant->udid = $request['udid'];
        $merchant->phoneModel = $request['phoneModel'];
        $merchant->osVersion = $request['osVersion'];
        $merchant->platform = $request['platform'];
        $merchant->appVersion = $request['appVersion'];
        $merchant->isActive = 1;
        $merchant->isAccess = 1;

        $is_saved = $merchant->save();

        if($is_saved){
            return response()->json(["code"=>200, "message"=>"Registered successfully."]);
        } else {
            return response()->json(["code"=>400, "message"=>"Registration failed."]);
        }
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'salesPrice' => ['required', 'numeric', 'max:999999.99'],
            'currencyCode' => ['required', 'string', 'max:255'],
            'currencySymbol' => ['required', 'string', 'max:255'],
            'stockQty' => ['required', 'integer', 'max:99999999999'],
            'merchant_id' => ['required', 'integer', 'max:99999999999999999999']
        ]);

        $product = new Product;

        $product->name = $request['name'];
        $product->salesPrice = $request['salesPrice'];
        $product->currencyCode = $request['currencyCode'];
        $product->currencySymbol = $request['currencySymbol'];
        $product->stockQty = $request['stockQty'];
        $product->isActive = 1;
        $product->merchant_id = $request['merchant_id'];

        $is_saved = $product->save();

        if($is_saved){
            return response()->json(["code"=>200, "message"=>"Product added successfully."]);
        } else {
            return response()->json(["code"=>400, "message"=>"Product addition failed."]);
        }
    }

    public function detailsProduct(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer', 'max:99999999999999999999']
        ]);

        $product = Product::find($request->id);

        if($product != null){
            return response()->json(["code"=>200, "message"=>"Product found.", "data"=>$product]);
        } else {
            return response()->json(["code"=>400, "message"=>"Product not found."]);
        }
    }
}