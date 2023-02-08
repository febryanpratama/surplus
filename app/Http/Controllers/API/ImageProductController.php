<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ImageProductService;
use Illuminate\Http\Request;

class ImageProductController extends Controller
{
    //
    protected $imageProductService;

    public function __construct(ImageProductService $imageProductService)
    {
        $this->imageProductService = $imageProductService;
    }


    public function index()
    {
        //
        $response = $this->imageProductService->getData();

        return response()->json($response);
    }

    public function store(Request $request)
    {
        //
        $response = $this->imageProductService->storeData($request->all());

        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        //
        $response = $this->imageProductService->updateData($request->all(), $id);

        return response()->json($response);
    }

    public function destroy($id)
    {
        //
        $response = $this->imageProductService->deleteData($id);

        return response()->json($response);
    }
}
