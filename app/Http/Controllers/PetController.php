<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // Método para listar todos os pets
    public function index()
    {
        $pets = Pet::all();
        return response()->json($pets);
    }

    // Método para exibir um pet específico
    public function show($id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json(['message' => 'Pet não encontrado'], 404);
        }

        return response()->json($pet);
    }

    // Método para criar um novo pet
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idcliente' => 'required|integer|exists:clientes,id',
            'nome' => 'required|string|max:255',
            'raca' => 'required|string|max:255',
            'observacao' => 'nullable|string',
            'valorpacote' => 'required|numeric|between:0,999999.99',
            'frequencia' => 'required|integer|in:7,15,30',
            'taxidog' => 'required|boolean',
        ]);

        $pet = Pet::create($validatedData);

        return response()->json($pet, 201);
    }

    // Método para atualizar um pet existente
    public function update(Request $request, $id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json(['message' => 'Pet não encontrado'], 404);
        }

        $validatedData = $request->validate([
            'idcliente' => 'required|integer|exists:clientes,id',
            'nome' => 'required|string|max:255',
            'raca' => 'required|string|max:255',
            'observacao' => 'nullable|string',
            'valorpacote' => 'required|numeric|between:0,999999.99',
            'frequencia' => 'required|integer|in:7,15,30',
            'taxidog' => 'required|boolean',
        ]);

        $pet->update($validatedData);

        return response()->json($pet);
    }

    // Método para deletar um pet
    public function destroy($id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json(['message' => 'Pet não encontrado'], 404);
        }

        $pet->delete();

        return response()->json(['message' => 'Pet deletado com sucesso']);
    }
}
