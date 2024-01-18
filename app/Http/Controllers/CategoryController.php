<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Exception;
use PDOException;

class CategoryController extends Controller
{
    public function index()
    {
        try{
            $data = Category::get();
            return response()->json(['status' => true, 'message' => 'menampilkan data success','data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'message' => 'menampilkan data failed']);
        }
    }
    public function store(CategoryRequest $request)
    {
        try{
            $validated = $request->validated();
            $data = Category::create($validated);
            return response()->json(['status' => true, 'message' => 'input data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'input data failed']);
        }
    }
    public function show(Category $category)
    {
        try{
            return response()->json(['status' => true, 'data' => $category]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'message' => 'Menampilkan data failed']);
        }
    }
    public function update(CategoryRequest $request, Category $category)
    {
        try{
            $validated = $request->validated();
            $category->update($validated);
            return response()->json(['status' => true, 'message' => 'update data success']);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'update data failed']);
        }
    }
    public function destroy(Category $category)
    {
        try{
            $data = $category->delete();
            return response()->json(['status' => true, 'message' => 'delete data success', 'data' => $data]);
        }catch(Exception | PDOException $e){
            return response()->json(['status' => false, 'messasge' => 'delete data failed']);
        }
    }
}
