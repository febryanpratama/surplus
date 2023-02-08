<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $response = $this->imageService->getData();
        return response()->json($response);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $response = $this->imageService->storeData($request->all());
        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $response = $this->imageService->updateData($request->all(), $id);
        return response()->json($response);
    }

    public function destroy($id)
    {
        $response = $this->imageService->deleteData($id);
        return response()->json($response);
    }
}
