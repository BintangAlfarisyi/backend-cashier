<?php

namespace App\Http\Controllers;

use App\Models\Transaction_detail;
use App\Http\Requests\Transaction_detailRequest;
use Exception;
use PDOException;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = Transaction_detail::get();
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
     * @param  \App\Http\Requests\StoreTrasaction_detailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Transaction_detailRequest $request)
    {
        try{
            $validated = $request->validated();
            $data = Transaction_detail::create($validated);
            return response()->json(['status' => true, 'message' => 'input data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'input data failed']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trasaction_detail  $trasaction_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction_detail $transaction_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trasaction_detail  $trasaction_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction_detail $transaction_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrasaction_detailRequest  $request
     * @param  \App\Models\Trasaction_detail  $trasaction_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Transaction_detailRequest $request, Transaction_detail $transactionDetail)
    {
        try{
            $validated = $request->validated();
            $transactionDetail->update($validated);
            return response()->json(['status' => true, 'message' => 'update data success']);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'update data failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trasaction_detail  $trasaction_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction_detail $transactionDetail)
    {
        try{
            $data = $transactionDetail->delete();
            return response()->json(['status' => true, 'message' => 'delete data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'delete data failed']);
        }
    }
}
