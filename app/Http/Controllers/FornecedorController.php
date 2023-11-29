<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produtos;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $fornecedores = Fornecedor::latest()->paginate(1);
        return view('fornecedores.index', compact('fornecedores'));
    }

    /**
     * store
     *
     * @param mixed $request
     * @return void
     */
    public function store(Request $request)
    {


        $fornecedor = Fornecedor::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'cep' => $request->cep,
            'email' => $request->email,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
        ]);



        if ($fornecedor) {
            return redirect()->route('fornecedores.index')->with(['success' => 'Inserido com sucesso']);
        } else {
            return redirect()->route('fornecedores.index')->with(['error' => 'Erro ao cadastrar xw']);
        }
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('fornecedores.create');
    }

    /**
     * edit
     *
     * @param mixed $fornecedor
     * @return void
     */
    public function edit($id)
    {


        $fornecedor = Fornecedor::find($id);
        return view('fornecedores.edit', compact('fornecedor'));
    }

    /**
     * update
     *
     * @param mixed $request
     * @param mixed $fornecedor
     * @return void
     */
    public function update(Request $request, $id)
    {


        //get data Blog by ID
        $fornecedor = Fornecedor::find($id);


        $fornecedor->update([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
        ]);


        if ($fornecedor) {
            return redirect()->route('fornecedores.index')->with(['success' => 'Inserido com sucesso']);
        } else {
            return redirect()->route('fornecedores.index')->with(['error' => 'Erro ao inserir']);
        }
    }

    /**
     * destroy
     *
     * @param mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();

        if ($fornecedor) {
            return redirect()->route('fornecedores.index')->with(['success' => 'Deletado com sucesso']);
        } else {
            return redirect()->route('fornecedores.index')->with(['error' => 'Erro']);
        }
    }

}
