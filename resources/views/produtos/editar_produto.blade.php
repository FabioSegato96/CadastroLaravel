@extends('layouts.app')
@section('titulo', 'Editar Produto')
    
@section('body')
    
    <div class="container text-center">
        <div class="card border">
            <div class="card-body">
                <h4>Editar Produto</h4>
                <form action="{{route('edicao_produto', $prod->id)}}" method="POST">
                    @csrf
                    <input type="text" name="nome" class="form-control mb-1" value="{{$prod->nome}}">
                    <select name="categoria_id" id="categoria_id">
                        @foreach ($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->nome}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="estoque" class="form-control mb-1" value="{{$prod->estoque}}">
                    <input type="text" name="preco" class="form-control mb-1" value="{{$prod->preco}}">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                    <input type="cancel" class="btn btn-danger" value="Cancel">
                </form>
            </div>
        </div>
    </div>

@endsection