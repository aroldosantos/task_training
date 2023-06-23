<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;

class ClassroomController extends Controller
{

    public function __construct(
        private Classroom $classroom
    ) {}

    public function index()
    {
        $classrooms = $this->classroom->all();
        return $classrooms;
    }

    public function store(ClassroomRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData) {

            $classroom = new Classroom();

            $classroom->name = $request->name;
            $classroom->capacity = $request->capacity;

            $classroom->save();

            return response()->json($classroom);
        }

        return response()->json($validatedData->errors(), 422);
    }

    public function show(string $id)
    {
        $classroom = $this->classroom->findOrfail($id);
        return response()->json($classroom);
    }

    public function update(ClassroomRequest $request, string $id)
    {
        $classroom = $this->classroom->findOrFail($id);

        $validatedData = $request->validated();

        if ($validatedData) {

            $classroom->update($request->all());

            return response()->json($classroom);

        }
    }

    public function destroy(string $id)
    {
        return response()->json(['error' => 'O recurso não está desabilitado.'], 404);
    }
}
