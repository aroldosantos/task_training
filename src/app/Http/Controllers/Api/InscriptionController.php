<?php

namespace App\Http\Controllers\Api;

use App\Models\Inscription;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InscriptionRequest;

class InscriptionController extends Controller
{

    public function __construct(
        private Inscription $inscription
    ) {}

    public function index()
    {
        $inscription = $this->inscription->all();
        return $inscription;
    }

    public function store(InscriptionRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData) {

            $inscription = new Inscription();

            $inscription->classroom_id = $request->classroom_id;
            $inscription->coffeebreak_id = $request->coffeebreak_id;
            $inscription->customer_id = $request->customer_id;
            $inscription->status = $request->status;

            $inscription->save();

            return response()->json($inscription);
        }

        return response()->json($validatedData->errors(), 422);
    }

    public function show(string $id)
    {
        $inscription = $this->inscription->findOrfail($id);
        return response()->json($inscription);
    }

    public function update(string $id)
    {
        $inscription = $this->inscription->findOrFail($id);

        if ($inscription->status == 'Confirmada') {
            $inscription->status = 'Cancelada';
        } else {
            $inscription->status = 'Confirmada';
        }

        $inscription->save();

        return response()->json($inscription);
    }

    public function destroy(string $id)
    {
        return response()->json(['error' => 'O recurso não está desabilitado.'], 404);
    }
}
