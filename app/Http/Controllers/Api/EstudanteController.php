<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EstudanteStoreRequest;
use App\Http\Requests\EstudanteUpdateRequest;
use App\Http\Resources\EstudanteResource;
use App\Services\EstudanteService;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{
    private $estudanteService;

    public function __construct(EstudanteService $estudanteService)
    {
        $this->estudanteService = $estudanteService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->estudanteService->findAll();

        return response()->json(EstudanteResource::collection($response), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstudanteStoreRequest $estudanteStoreRequest)
    {
        $response = $this->estudanteService->store($estudanteStoreRequest->all());
        if ($response)
            return response()->json(new EstudanteResource($response), 200);

        return response()->json(['message' => 'error'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = $this->estudanteService->show($id);
        if ($response)
            return response()->json(new EstudanteResource($response));

        return response()->json(['message' => 'Error'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstudanteUpdateRequest $estudanteUpdateRequest, string $id)
    {
        $response = $this->estudanteService->update($estudanteUpdateRequest->all(), $id);
        if ($response)
            return response()->json(['message' => 'Feito com sucesso'], 200);

        return response()->json(['message' => 'Error'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->estudanteService->delete($id);
        if ($response)
            return response()->json(['message' => 'Feito com sucesso']);

        return response()->json(['message' => 'Error'], 500);
    }

    public function hello(){
        echo "hello world";
    }
}
