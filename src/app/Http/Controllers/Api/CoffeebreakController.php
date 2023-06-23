<?php

namespace App\Http\Controllers\Api;

use App\Models\Coffeebreak;
use App\Http\Controllers\Controller;
use App\Http\Requests\CoffeebreakRequest;

class CoffeebreakController extends Controller
{

    public function __construct(
        private Coffeebreak $coffeebreak
    ) {}

    public function index()
    {
        $coffeebreak = $this->coffeebreak->all();
        return $coffeebreak;
    }

    public function store(CoffeebreakRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData) {

            $coffeebreak = new Coffeebreak();

            $coffeebreak->name = $request->name;
            $coffeebreak->capacity = $request->capacity;

            $coffeebreak->save();

            return response()->json($coffeebreak);
        }

        return response()->json($validatedData->errors(), 422);
    }

    public function show(string $id)
    {
        $coffeebreak = $this->coffeebreak->findOrfail($id);
        return response()->json($coffeebreak);
    }

    public function update(CoffeebreakRequest $request, string $id)
    {
        $coffeebreak = $this->coffeebreak->findOrFail($id);

        $validatedData = $request->validated();

        if ($validatedData) {

            $coffeebreak->update($request->all());

            return response()->json($coffeebreak);

        }
    }

    public function destroy(string $id)
    {
        return response()->json(['error' => 'O recurso não está desabilitado.'], 404);
    }
}
