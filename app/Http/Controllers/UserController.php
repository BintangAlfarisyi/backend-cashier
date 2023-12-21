<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PDOException;

class UserController extends Controller
{
    public function index()
    {
        try {
            $data = User::get();
            return response()->json(['status' => true, 'message' => 'menampilkan data success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'menampilkan data failed']);
        }
    }

    public function store(UserRequest $request)
    {
        try {
            $validated = $request->validated();
            $data = User::create($validated);
            return response()->json(['status' => true, 'message' => 'input data success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'messasge' => 'input data failed']);
        }
    }

    public function update(UserRequest $request, User $user)
    {
        try{
            $validated = $request->validated();
            $user->update($validated);
            return response()->json(['status' => true, 'message' => 'update data success']);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'update data failed']);
        }
    }

    public function destroy(User $user)
    {
        try{
            $data = $user->delete();
            return response()->json(['status' => true, 'message' => 'delete data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'delete data failed']);
        }
    }
}
