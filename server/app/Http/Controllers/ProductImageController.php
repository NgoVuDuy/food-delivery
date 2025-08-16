<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{

    //
    public function store(Request $request)
    {

        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'No file received'], 400);
        }

        $file = $request->file('image');


        // $uploaded = Cloudinary::upload($file->getRealPath(), [
        //     'folder' => 'products',
        // ]);

        // $uploaded = $file->storeOnCloudinary('products');

        $uploaded = Cloudinary::uploadApi()->upload(
            $file->getRealPath(),
            ['folder' => 'products'] // tùy chọn folder nếu cần
        );

        ProductImage::create([
            'public_id' => $uploaded['public_id'],
            'url' => $uploaded['secure_url'],
        ]);

        return response()->json([
            'code' => 1,
            'message' => 'Tải ảnh thành công',
        ]);
    }
}
