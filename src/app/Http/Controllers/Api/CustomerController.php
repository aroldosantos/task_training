<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\customerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function __construct(
        private Customer $customer
    ) {}

    public function index()
    {
        $customer = $this->customer->all();
        return $customer;
    }

    public function store(CustomerRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData) {

            $customer = new Customer();

            $customer->name = $request->name;
            $customer->surname = $request->surname;
            $customer->cpf = $request->cpf;

            $customer->save();

            return response()->json($customer);
        }

        return response()->json($validatedData->errors(), 422);
    }

    public function show(string $id)
    {
        $customer = $this->customer->findOrfail($id);
        return response()->json($customer);
    }

    public function update(CustomerRequest $request, string $id)
    {
        $customer = $this->customer->findOrFail($id);

        $validatedData = $request->validated();

        if ($validatedData) {

            $customer->update($request->all());

            return response()->json($customer);

        }
    }

    public function destroy(string $id)
    {
        return response()->json(['error' => 'O recurso não está desabilitado.'], 404);
    }
}
