@extends('layouts.app')
@section('titulo', 'Editar Categoria')
    
@section('body')
    
    <div class="container text-center">
        <div class="card border">
            <div class="card-body">
                <h4>Editar Categoria</h4>
                <form action="{{route('edicao_departamento', $cat->id)}}" method="POST">
                    @csrf
                    <input type="text" name="nome" class="form-control mb-1" value="{{$cat->nome}}">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                    <input type="cancel" class="btn btn-danger" value="Cancel">
                </form>
            </div>
        </div>
    </div>

@endsection