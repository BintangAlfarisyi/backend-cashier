<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Requests\StockRequest;
use Exception;
use PDOException;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = Stock::get();
            return response()->json(['status' => true, 'message' => 'menampilkan data success','data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'message' => 'menampilkan data failed']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockRequest $request)
    {
        try{
            $validated = $request->validated();
            $data = Stock::create($validated);
            return response()->json(['status' => true, 'message' => 'input data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'input data failed']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockRequest  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(StockRequest $request, Stock $stock)
    {
        try{
            $validated = $request->validated();
            $stock->update($validated);
            return response()->json(['status' => true, 'message' => 'update data success']);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'update data failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        try{
            $data = $stock->delete();
            return response()->json(['status' => true, 'message' => 'delete data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'delete data failed']);
        }
    }
}
