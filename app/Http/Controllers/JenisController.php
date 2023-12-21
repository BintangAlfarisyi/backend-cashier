<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisRequest;
use App\Models\Jenis;
use Exception;
use PDOException;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Jenis::get();
            return response()->json(['status' => true, 'message' => 'menampilkan data success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
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
     * @param  \App\Http\Requests\StoreJenisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenisRequest $request)
    {
        try {
            $validated = $request->validated();
            $data = Jenis::create($validated);
            return response()->json(['status' => true, 'message' => 'input data success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'messasge' => 'input data failed']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisRequest  $request
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(JenisRequest $request, Jenis $jeni)
    {
        try{
            $validated = $request->validated();
            $jeni->update($validated);
            return response()->json(['status' => true, 'message' => 'update data success']);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'update data failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis $jeni)
    {
        try{
            $data = $jeni->delete();
            return response()->json(['status' => true, 'message' => 'delete data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'delete data failed']);
        }
    }
}
