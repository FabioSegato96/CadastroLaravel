<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;
use App\Models\Categoria as ModelsCategoria;

class ControladorCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Categoria::all();
        return view('departamentos.departamentos', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamentos.novo_departamento');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cat = new Categoria();
        $cat->nome = $request->input('nome');
        $cat->save();

        $cats = Categoria::all();
        return view('departamentos.departamentos', compact('cats'));
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
        $cat = Categoria::find($id);
        if (isset($cat)) {
            return view('departamentos.editar_departamento', compact('cat'));
        }
        return redirect('/departamentos');   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = Categoria::find($id);
        if (isset($cat)) {
            $cat->nome = $request->input('nome');
            $cat->save();
        }
        return redirect('/departamentos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Categoria::find($id);
        if (isset($cat)) {
            $cat->delete();
        }
        $cats = Categoria::all();
        return view('departamentos.departamentos', compact('cats'));
    }
}
