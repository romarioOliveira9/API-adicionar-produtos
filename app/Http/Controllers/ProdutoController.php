<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return response()->json(['produtos'=>$produtos], 200);
    }

    public function show($id)
    {
        $produtos = Produto::find($id);
        if($produtos)
        {
            return response()->json(['produtos'=>$produtos], 200);
        }
        else
        {
            return response()->json(['message'=>'Produto não encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required|max:255',
            'preço'=>'required|numeric',
            'quantidade'=>'required|numeric',
            'sku'=>'required|max:255',
        ]);

        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->preço = $request->preço;
        $produto->quantidade = $request->quantidade;
        $produto->sku = $request->sku;
        $produto->save();
        return response()->json(['message'=>'Produto adicionado com sucesso'], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'=>'required|max:255',
            'preço'=>'required|numeric',
            'quantidade'=>'required|numeric',
            'sku'=>'required|max:255',
        ]);

        $produto = Produto::find($id);
        if($produto)
        {
            $produto->nome = $request->nome;
            $produto->preço = $request->preço;
            $produto->quantidade = $request->quantidade;
            $produto->sku = $request->sku;
            $produto->update();

            return response()->json(['message'=>'Produto atualizado com sucesso'], 200);
        }
        else
        {
            return response()->json(['message'=>'Produto não encontrado'], 404);
        }
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        if($produto)
        {
            $produto->delete();
            return response()->json(['message'=>'Produto deletado com sucesso'], 200);
        }
        else
        {
            return response()->json(['message'=>'Produto não encontrado'], 404);
        }
    }
}
