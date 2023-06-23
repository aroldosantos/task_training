<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(
        private User $user
    ) {}

    public function index()
    {
        $users = $this->user->all();
        return $users;
    }

    public function store(StoreUpdateUserRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData) {
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->save();

            return response()->json($user, 201);
        }

        return response()->json($validatedData->errors(), 422);

    }

    public function show($id)
    {
        $user = $this->user->findOrfail($id);

        // if ($user === null) {
        //     return response()->json(['error' => 'O recurso procurado não existe'], 404);
        // }
        return response()->json($user);
    }

    public function update(StoreUpdateUserRequest $request, $id)
    {

        $user = $this->user->findOrFail($id);

        $validatedData = $request->validated();

        if ($validatedData) {

            $user->update($request->all());

            return response()->json([$user, 200]);

        }

    }

    public function destroy($id)
    {
        return response()->json(['error' => 'O recurso não está desabilitado.'], 404);

    }

}
