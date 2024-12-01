<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Método para listar todos os clientes
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    // Método para exibir um cliente específico
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        return response()->json($cliente);
    }

    // Método para criar um novo cliente
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nome' => 'required|string|max:255',
            'Endereco' => 'required|string|max:255',
            'Telefone' => 'required|string|max:15',
            'Observacao' => 'nullable|string',
            'DiaBanho' => 'required|integer|between:0,6',
            'ordemtaxidog' => 'nullable|integer',
            'ativo' => 'required|boolean',
        ]);

        $cliente = Cliente::create($validatedData);

        return response()->json($cliente, 201);
    }

    // Método para atualizar um cliente existente
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        $validatedData = $request->validate([
            'Nome' => 'required|string|max:255',
            'Endereco' => 'required|string|max:255',
            'Telefone' => 'required|string|max:15',
            'Observacao' => 'nullable|string',
            'DiaBanho' => 'required|integer|between:0,6',
            'ordemtaxidog' => 'nullable|integer',
            'ativo' => 'required|boolean',
        ]);

        $cliente->update($validatedData);

        return response()->json($cliente);
    }

    // Método para deletar um cliente
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        $cliente->delete();

        return response()->json(['message' => 'Cliente deletado com sucesso']);
    }
}
