<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Facades\Validator;

class ImageService
{
    public function getData()
    {
        $data = Image::get();

        return [
            'status' => true,
            'path' => 'images/src.jpg',
            'messages' => 'Success Get Image',
            'data' => $data
        ];
    }

    public function storeData($data)
    {
        //

        // dd($data);
        $validator = Validator::make($data, [
            'name' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'enable' => 'required'
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'messages' => $validator->errors()->first(),
                'data' => null
            ];
        }

        $image = $data['photo'];
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        $data['photo'] = $name;

        $image = Image::create([
            'name' => $data['name'],
            'photo' => $data['name'],
            'file' => $data['photo'],
            'enable' => $data['enable'] == true ? 1 : 0
        ]);

        return [
            'status' => true,
            'path' => 'images/src.jpg',
            'messages' => 'Success Create Image',
            'data' => $image
        ];
    }

    public function updateData($data, $image_id)
    {

        $validator = Validator::make($data, [
            'name' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'enable' => 'required'
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'messages' => $validator->errors()->first(),
                'data' => null
            ];
        }

        if ($data['photo'] != null) {
            $image = $data['photo'];
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            $data['photo'] = $name;
        }

        $image = Image::find($image_id);

        $data['enable'] = $data['enable'] == true ? 1 : 0;
        $image->update($data);

        return [
            'status' => true,
            'path' => 'images/src.jpg',
            'messages' => 'Success Update Image',
            'data' => $image
        ];
    }

    public function deleteData($id)
    {
        $image = Image::find($id);
        if (!$image) {
            return [
                'status' => false,
                'messages' => 'Image Not Found',
                'data' => null
            ];
        }
        $image->delete();

        return [
            'status' => true,
            'path' => 'images/src.jpg',
            'messages' => 'Success Delete Image',
            'data' => null
        ];
    }
}
