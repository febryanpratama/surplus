<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $response = $this->productService->getData();
        return response()->json($response);
    }

    public function store(Request $request)
    {
        $response = $this->productService->storeData($request->all());
        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $response = $this->productService->updateData($request->all(), $id);
        return response()->json($response);
    }

    public function destroy($id)
    {
        $response = $this->productService->deleteData($id);
        return response()->json($response);
    }
}
