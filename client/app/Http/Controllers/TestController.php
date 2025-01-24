<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    //
    function getAPI()
    {
        $response = Http::get('http://localhost:8000/');

        return $response->json();
    }
}
