<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $produtos = Produtos::latest()->paginate(1);
        return view('produtos.index', compact('produtos'));
    }

    /**
     * store
     *
     * @param mixed $request
     * @return void
     */
    public function store(Request $request)
    {


        $produto = Produtos::create([
            'codigo' => $request->codigo,
            'nome_produto' => $request->nome_produto,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'categoria' => $request->categoria,
            'fornecedor' => $request->fornecedor,
            'quantidade' => $request->quantidade,
        ]);


        if ($produto) {
            return redirect()->route('produtos.index')->with(['success' => 'Inserido com sucesso']);
        } else {
            return redirect()->route('produtos.index')->with(['error' => 'Erro ao cadastrar xw']);
        }
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * edit
     *
     * @param mixed $produtos
     * @return void
     */
    public function edit($id)
    {


        $produtos = Produtos::find($id);
        return view('produtos.edit', compact('produtos'));
    }

    /**
     * update
     *
     * @param mixed $request
     * @param mixed $produtos
     * @return void
     */
    public function update(Request $request, $id)
    {


        //get data Blog by ID
        $produtos = Produtos::find($id);


        $produtos->update([
            'codigo' => $request->codigo,
            'nome_produto' => $request->nome_produto,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'categoria' => $request->categoria,
            'fornecedor' => $request->fornecedor,
            'quantidade' => $request->quantidade,
        ]);


        if ($produtos) {
            return redirect()->route('produtos.index')->with(['success' => 'Inserido com sucesso']);
        } else {
            return redirect()->route('produtos.index')->with(['error' => 'Erro ao inserir']);
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
        $produto = Produtos::findOrFail($id);
        $produto->delete();

        if ($produto) {
            return redirect()->route('produtos.index')->with(['success' => 'Deletado com sucesso']);
        } else {
            return redirect()->route('produtos.index')->with(['error' => 'Erro']);
        }
    }

}
