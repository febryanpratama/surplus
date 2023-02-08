<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CategoryProductService;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    //

    protected $categoryProductService;

    public function __construct(CategoryProductService $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }
    public function index()
    {
        $response = $this->categoryProductService->getData();
        return response()->json($response);
    }

    public function store(Request $request)
    {
        $response = $this->categoryProductService->storeData($request->all());
        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $response = $this->categoryProductService->updateData($request->all(), $id);
        return response()->json($response);
    }

    public function destroy($id)
    {
        $response = $this->categoryProductService->deleteData($id);
        return response()->json($response);
    }
}
