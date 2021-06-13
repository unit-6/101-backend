<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Merchant;
use App\Product;
use App\Sale;
use App\Transaction;
use DateTime;
use Str;
use DB;

class MerchantsController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'udid' => ['required', 'string', 'max:255'],
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
            return response()->json(["code"=>200, "message"=>"Merchant registered successfully.", "merchant_id"=>$merchant->key]);
        } else {
            return response()->json(["code"=>400, "message"=>"Merchant registration failed."]);
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
            'merchant_id' => ['required', 'string', 'exists:App\Merchant,key']
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
            return response()->json(["code"=>400, "message"=>"Product add failed."]);
        }
    }

    public function listProduct(Request $request)
    {
        $request->validate([
            'merchant_id' => ['required', 'string', 'exists:App\Merchant,key']
        ]);

        $product = Product::where('merchant_id', $request->merchant_id)->get();
        $total = $product->count();

        if($total > 0){
            return response()->json(["code"=>200, "message"=>"Product listed successfully.", "data"=>$product, "total"=>$total]);
        } else {
            return response()->json(["code"=>400, "message"=>"This merchant has no product registered."]);
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

    public function editProduct(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer', 'max:99999999999999999999'],
            'name' => ['required', 'string', 'max:255'],
            'salesPrice' => ['required', 'numeric', 'max:999999.99'],
            'currencyCode' => ['required', 'string', 'max:255'],
            'currencySymbol' => ['required', 'string', 'max:255'],
            'stockQty' => ['required', 'integer', 'max:99999999999'],
            'isActive' => ['required', 'boolean']
        ]);

        $product = Product::find($request->id);

        $product->name = $request['name'];
        $product->salesPrice = $request['salesPrice'];
        $product->currencyCode = $request['currencyCode'];
        $product->currencySymbol = $request['currencySymbol'];
        $product->stockQty = $request['stockQty'];
        $product->isActive = $request['isActive'];

        $is_saved = $product->save();

        if($is_saved){
            return response()->json(["code"=>200, "message"=>"Product edited successfully."]);
        } else {
            return response()->json(["code"=>400, "message"=>"Product edit failed."]);
        }
    }

    public function startSales(Request $request)
    {
        $request->validate([
            'cost' => ['required', 'numeric', 'max:999999.99'],
            'currencyCode' => ['required', 'string', 'max:255'],
            'currencySymbol' => ['required', 'string', 'max:255'],
            'merchant_id' => ['required', 'string', 'exists:App\Merchant,key']
        ]);

        $sale = new Sale;

        $sale->cost = $request['cost'];
        $sale->profit = 0;
        $sale->currencyCode = $request['currencyCode'];
        $sale->currencySymbol = $request['currencySymbol'];
        $sale->status = 1;
        $sale->merchant_id = $request['merchant_id'];

        $is_saved = $sale->save();

        if($is_saved){
            return response()->json(["code"=>200, "message"=>"Sale created successfully.", "sale_id"=>$sale->id, "status"=>$sale->status]);
        } else {
            return response()->json(["code"=>400, "message"=>"Sale create failed."]);
        }
    }

    public function addTrx(Request $request)
    {
        $request->validate([
            'qty' => ['required', 'integer', 'max:99999999999'],
            'currencyCode' => ['required', 'string', 'max:255'],
            'currencySymbol' => ['required', 'string', 'max:255'],
            'product_id' => ['required', 'integer', 'exists:App\Product,id'],
            'sale_id' => ['required', 'integer', 'exists:App\Sale,id']
        ]);

        DB::beginTransaction();

        $sale = Sale::find($request->sale_id);

        if($sale != null) {
            if($sale->status == 1) {
                $product = Product::find($request->product_id);

                if($product != null) {
                    $transaction = new Transaction;

                    $transaction->qty = $request['qty'];
                    $transaction->totalPrice = $product->salesPrice * $request['qty'];
                    $transaction->currencyCode = $request['currencyCode'];
                    $transaction->currencySymbol = $request['currencySymbol'];
                    $transaction->product_id = $request['product_id'];
                    $transaction->sale_id = $request['sale_id'];

                    $is_saved = $transaction->save();

                    // Update quantity balance in product table
                    $product->stockQty = $product->stockQty - $request['qty'];
                    $is_saved_2 = $product->save();

                    if($is_saved && $is_saved_2) {
                        DB::commit();
                        return response()->json(["code"=>200, "message"=>"Transaction recorded successfully."]);
                    } else {
                        DB::rollBack();
                        return response()->json(["code"=>400, "message"=>"Transaction failed to be recorded."]);
                    }
                } else {
                    return response()->json(["code"=>400, "message"=>"Product id not found."]);
                }
            } else {
                return response()->json(["code"=>400, "message"=>"Transaction refused to be recorded because the sale has ended."]);
            }
        }
    }

    public function endSales(Request $request)
    {
        $request->validate([
            'sale_id' => ['required', 'integer', 'exists:App\Sale,id']
        ]);

        $sale = Sale::with('rel_transaction')->find($request->sale_id);

        if($sale != null) {
            // $sum = [];

            // foreach ($sale->rel_transaction as $txn) {
            //     if(array_key_exists($txn->product_id, $sum)) {
            //         $sum[$txn->product_id]['qty'] += $txn->qty;
            //         $sum[$txn->product_id]['totalPrice'] += $txn->totalPrice;
            //     } else {
            //         $sum[$txn->product_id]['qty'] = $txn->qty;
            //         $sum[$txn->product_id]['totalPrice'] = $txn->totalPrice;
            //     }
            // }

            $totSales = 0;

            foreach ($sale->rel_transaction as $txn) {
                $totSales += $txn->totalPrice;
            }

            $sale->status = 0;
            $sale->profit = $totSales - $sale->cost;

            if($sale->save()) {
                return response()->json(
                    [
                        "code"=>200,
                        "message"=>"Sale ended successfully.",
                        "sale_id"=>$sale->id,
                        "profit"=>$sale->profit,
                        "status"=>$sale->status
                    ]
                );
            } else {
                return response()->json(["code"=>400, "message"=>"Failed to end sale."]);
            }
        } else {
            return response()->json(["code"=>400, "message"=>"Failed to find sale with given id."]);
        }
    }

    public function salesHistory(Request $request)
    {
        $request->validate([
            'merchant_id' => ['required', 'string', 'exists:App\Merchant,key'],
            'start_date' => ['required', 'date_format:Y-m-d'],
            'end_date' => ['nullable', 'date_format:Y-m-d']
        ]);

        if($request->end_date != null) {
            $sales = Sale::where('merchant_id', $request->merchant_id)
                            ->whereBetween('created_at', [$request->start_date, $request->end_date])
                            ->where('status', 0)
                            ->get();
        } else {
            $sales = Sale::where('merchant_id', $request->merchant_id)
                            ->where('created_at', 'LIKE', $request->start_date . '%')
                            ->where('status', 0)
                            ->get();
        }

        if($sales->count() > 0) {
            $totCapital = 0;
            $totProfit = 0;
            $totDuration = 0;

            foreach ($sales as $sale) {
                $start = new DateTime($sale->created_at);
                $end = new DateTime($sale->updated_at);
                $interval = $start->diff($end);

                $totCapital += $sale->cost;
                $totProfit += $sale->profit;
                $totDuration += (int) $interval->format('%s');
                $totDuration += ((int) $interval->format('%i')) * 60;
                $totDuration += ((int) $interval->format('%h')) * 60 * 60;
                $totDuration += ((int) $interval->format('%d')) * 24 * 60 * 60;
            }

            $totSales = $totProfit + $totCapital;
            // $capitalBal = 0;    // What is this?

            $durationObj = null;
            $durationObj = (object) $durationObj;
            $durationObj->seconds = (int) ($totDuration % 60);
            $c_min = (int) ($totDuration / 60);
            $durationObj->minutes = (int) ($c_min % 60);
            $c_hour = (int) ($c_min / 60);
            $durationObj->hours = (int) ($c_hour % 24);
            $durationObj->days = (int) ($c_hour / 24);

            return response()->json(
                [
                    "code"=>200,
                    "message"=>"Ended sale(s) found for/between the specified date(s).",
                    "capital"=>$totCapital,
                    "sales"=>$totSales,
                    "profit"=>$totProfit,
                    // "capital_bal"=>$capitalBal,
                    "duration"=>$durationObj
                ]
            );
        } else {
            return response()->json(["code"=>400, "message"=>"No ended sale found for/between the specified date(s)."]);
        }
    }
}
