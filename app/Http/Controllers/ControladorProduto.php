<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Produto as ModelsProduto;
use App\Models\Categoria;
use App\Models\Categoria as ModelsCategoria;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexView()
    {
        return view('produtos.produtos');
    }

    public function indexJson()
    {
        $prods = Produto::all();
        return json_encode($prods);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Categoria::all();
        return view('produtos.novo_produto', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prod = new Produto();
        $prod->nome = $request->input('nome');
        $prod->estoque = $request->input('estoque');
        $prod->preco = $request->input('preco');
        $prod->categoria_id = $request->input('categoria_id');
        $prod->save();

        $prods = Produto::all();
        return json_encode($prods);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cats = Categoria::all();    
        $prod = Produto::find($id);
        if (isset($prod)) {
            return view('produtos.editar_produto', compact('prod', 'cats'));
        }
        return redirect('/produtos');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prod = Produto::find($id);
        if (isset($prod)) {
            $prod->nome = $request->input('nome');
            $prod->estoque = $request->input('estoque');
            $prod->preco = $request->input('preco');
            $prod->categoria_id = $request->input('categoria_id');
            $prod->save();
        }
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prod = Produto::find($id);
        if (isset($prod)) {
            $prod->delete();
        }
    }
}
