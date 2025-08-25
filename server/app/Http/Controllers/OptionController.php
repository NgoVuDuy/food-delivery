<?php

namespace App\Http\Controllers;

use App\Services\OptionService;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    private OptionService $optionService;

    public function __construct(OptionService $optionService) {

        $this->optionService = $optionService;
    }

    public function index()
    {
        return response()->json($this->optionService->getAllOptions(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $options = $request->all();
        return response()->json($this->optionService->createOption($options), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return response()->json($this->optionService->getOptionById($id), 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->all();
        return response()->json($this->optionService->updateOption($id, $data), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $this->optionService->deleteOption($id);

        return response()->json(null, 204);
    }
}
