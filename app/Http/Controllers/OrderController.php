<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\OrderRequest;
use Exception;
use PDOException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = Order::get();
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        try{
            $validated = $request->validated();
            $data = Order::create($validated);
            return response()->json(['status' => true, 'message' => 'input data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'input data failed']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        try{
            $validated = $request->validated();
            $order->update($validated);
            return response()->json(['status' => true, 'message' => 'update data success']);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'update data failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        try{
            $data = $order->delete();
            return response()->json(['status' => true, 'message' => 'delete data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'delete data failed']);
        }
    }
}
