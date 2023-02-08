<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $response = $this->categoryService->getData();

        if ($response['status']) {
            return response()->json($response);
        } else {
            return response()->json($response);
        }
    }

    public function store(Request $request)
    {
        $response = $this->categoryService->storeData($request->all());

        if ($response['status']) {
            return response()->json($response);
        } else {
            return response()->json($response);
        }
    }

    public function update(Request $request, $id)
    {
        $response = $this->categoryService->updateData($request->all(), $id);

        if ($response['status']) {
            return response()->json($response);
        } else {
            return response()->json($response);
        }
    }

    public function destroy($id)
    {
        $response = $this->categoryService->deleteData($id);

        if ($response['status']) {
            return response()->json($response);
        } else {
            return response()->json($response);
        }
    }
}
