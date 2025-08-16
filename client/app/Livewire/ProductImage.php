<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductImage extends Component
{
    use WithFileUploads;
    public $request;


    public function upload_image()
    {
        $file = $this->request;

        // dd($file);
        // $response = Http::post(Component::$url . 'product-images');

        $response = Http::attach(
            'image',                             // tên field phải khớp với key bên controller Laravel
            file_get_contents($file->getRealPath()), // nội dung file
            $file->getClientOriginalName()      // tên file
        )->post(Component::$url . 'product-images');

        dd($response->json());
    }

    public function render()
    {
        return view('livewire.product-image');
    }
}
