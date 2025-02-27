<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Echo_;

class TestController extends Controller
{
    //
    function getAPI()
    {        
        $response = Http::get('http://localhost:8001/api/products');

        return $response->json();
    }
}
