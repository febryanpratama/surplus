<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    public function getData()
    {
        // 
        $data = Product::get();

        return [
            'status' => true,
            'messages' => 'Success Get Product',
            'data' => $data
        ];
    }

    public function storeData($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required',
            'description' => 'required',
            'enable' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'messages' => $validator->errors()->first(),
                'data' => null
            ];
        }

        $product = Product::create($data);

        return [
            'status' => true,
            'messages' => 'Success Create Product',
            'data' => $product
        ];
    }

    public function updateData($data, $prod_id)
    {
        $data['product_id'] = $prod_id;

        $validator = Validator::make($data, [
            'product_id' => 'required|exists:products,id',
            'name' => 'required',
            'description' => 'required',
            'enable' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'messages' => $validator->errors()->first(),
                'data' => null
            ];
        }

        $product = Product::find($prod_id);
        $product->update($data);

        return [
            'status' => true,
            'messages' => 'Success Update Product',
            'data' => $product
        ];
    }

    public function deleteData($prod_id)
    {
        $product = Product::find($prod_id);
        if (!$product) {
            return [
                'status' => false,
                'messages' => 'Product Not Found',
                'data' => null
            ];
        }
        $product->delete();

        return [
            'status' => true,
            'messages' => 'Success Delete Product',
            'data' => null
        ];
    }
}
