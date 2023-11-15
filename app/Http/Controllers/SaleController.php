<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::orderBy('id','desc')->get();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        try{
             $stock = Stock::where('product_id', $request->product_id)->where('batch', $request->batch)->first();

            DB::beginTransaction();

            $pur = new Sale();
            $pur->fill($request->all());
            $pur->save();

           
            $stock->stock = $stock->stock - $request->quantity;
            $stock->save();

            DB::commit();

           

            return response()->json($pur);

        }catch(Exception $e){

            dd($e->getMessage());
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
}
