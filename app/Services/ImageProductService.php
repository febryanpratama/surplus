<?php

namespace App\Services;

use App\Models\Image;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Validator;

class ImageProductService
{
    //
    public function getData()
    {
        $data = ProductImage::with('product', 'image')->get();

        return [
            'status' => true,
            'messages' => 'Success Get Image Product',
            'data' => $data
        ];
    }

    public function  storeData($data)
    {
        $validator = Validator::make($data, [
            'product_id' => 'required|exists:products,id',
            'image_id' => 'required|exists:images,id'
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'messages' => $validator->errors()->first(),
                'data' => null
            ];
        }

        $imageProduct = ProductImage::create($data);

        return [
            'status' => true,
            'messages' => 'Success Create Image Product',
            'data' => $imageProduct
        ];
    }

    public function updateData($data, $prod_img_id)
    {
        $data['product_image_id'] = $prod_img_id;

        $validator = Validator::make($data, [
            'product_image_id' => 'required|exists:product_images,id',
            'product_id' => 'required|exists:products,id',
            'image_id' => 'required|exists:images,id'
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'messages' => $validator->errors()->first(),
                'data' => null
            ];
        }

        $imageProduct = ProductImage::find($prod_img_id);
        $imageProduct->update($data);

        return [
            'status' => true,
            'messages' => 'Success Update Image Product',
            'data' => $imageProduct
        ];
    }

    public function deleteData($prod_img_id)
    {
        $imageProduct = ProductImage::find($prod_img_id);

        if (!$imageProduct) {
            return [
                'status' => false,
                'messages' => 'Image Product Not Found',
                'data' => null
            ];
        }
        $imageProduct->delete();

        return [
            'status' => true,
            'messages' => 'Success Delete Image Product',
            'data' => $imageProduct
        ];
    }
}
