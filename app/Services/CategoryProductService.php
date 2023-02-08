<?php

namespace App\Services;

use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Validator;

class CategoryProductService
{
    //
    public function getData()
    {
        $data = CategoryProduct::with('category', 'product')->get();

        return [
            'status' => true,
            'messages' => 'Success Get Category Product',
            'data' => $data
        ];
    }

    public function storeData($data)
    {
        $validator = Validator::make($data, [
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id'
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'messages' => $validator->errors()->first(),
                'data' => null
            ];
        }

        $categoryProduct = CategoryProduct::create($data);

        return [
            'status' => true,
            'messages' => 'Success Create Category Product',
            'data' => $categoryProduct
        ];
    }

    public function updateData($data, $cat_prod_id)
    {
        $data['category_product_id'] = $cat_prod_id;

        $validator = Validator::make($data, [
            'category_product_id' => 'required|exists:category_products,id',
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id'
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'messages' => $validator->errors()->first(),
                'data' => null
            ];
        }

        $categoryProduct = CategoryProduct::find($data['category_product_id']);
        $categoryProduct->update($data);

        return [
            'status' => true,
            'messages' => 'Success Update Category Product',
            'data' => $categoryProduct
        ];
    }

    public function deleteData($cat_prod_id)
    {
        $categoryProduct = CategoryProduct::find($cat_prod_id);

        if (!$categoryProduct) {
            return [
                'status' => false,
                'messages' => 'Category Product Not Found',
                'data' => null
            ];
        }

        $categoryProduct->delete();

        return [
            'status' => true,
            'messages' => 'Success Delete Category Product',
            'data' => null
        ];
    }
}
