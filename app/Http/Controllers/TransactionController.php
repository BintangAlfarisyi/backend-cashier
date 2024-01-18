<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\TransactionRequest;
use Exception;
use PDOException;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = Transaction::get();
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
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        try{
            $validated = $request->validated();
            $data = Transaction::create($validated);
            return response()->json(['status' => true, 'message' => 'input data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'input data failed']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        try{
            $validated = $request->validated();
            $transaction->update($validated);
            return response()->json(['status' => true, 'message' => 'update data success']);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'update data failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        try{
            $data = $transaction->delete();
            return response()->json(['status' => true, 'message' => 'delete data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'delete data failed']);
        }
    }
}
