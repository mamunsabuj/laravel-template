<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::orderBy('id','desc')->get();
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get();
        return view('purchases.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $pur = new Purchase();
            $pur->fill($request->all());
            $pur->batch = uniqid();
            $pur->save();

            $stock = new Stock();
            $stock->product_id = $request->product_id;
            $stock->batch = $pur->batch;
            $stock->stock = $pur->quantity;

            $stock->save();

            DB::commit();

            return response()->json($pur);

        }catch(Exception $e){
            DB::rollBack();
            return response()->json('failed');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getPurBatches($id)
    {
        $batches = Stock::where('product_id', $id)->get('batch');
        return response()->json(collect($batches)->pluck('batch'));
    }

    public function getProdutStock($product_id, $batch)
    {
        $stock = Stock::where('product_id', $product_id)->where('batch', $batch)->first();
        return response()->json($stock);
    }

}
