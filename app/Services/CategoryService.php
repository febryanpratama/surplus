<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryService
{

    public function getData()
    {
        $data = Category::get();

        return [
            'data' => $data,
            'message' => 'success',
            'status' => true
        ];
    }

    public function storeData($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required',
            'enable' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return [
                'data' => null,
                'message' => $validator->errors()->first(),
                'status' => false
            ];
        }

        $category = Category::create($data);

        return [
            // 'data' => $category,
            'message' => 'Success Store Category',
            'status' => true
        ];
    }

    public function updateData($data, $cat_id)
    {

        $data['category_id'] = $cat_id;

        $validator = Validator::make($data, [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'enable' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return [
                'data' => null,
                'message' => $validator->errors()->first(),
                'status' => false
            ];
        }

        $category = Category::find($cat_id);
        $category->update($data);

        return [
            // 'data' => $category,
            'message' => 'Success Update Category',
            'status' => true
        ];
    }

    public function deleteData($cat_id)
    {
        $category = Category::find($cat_id);

        if (!$category) {
            return [
                'data' => null,
                'message' => 'Category Not Found',
                'status' => false
            ];
        }

        $category->delete();

        return [
            // 'data' => $category,
            'message' => 'Success Delete Category',
            'status' => true
        ];
    }
}
