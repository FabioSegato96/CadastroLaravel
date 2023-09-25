@extends('layouts.app')
@section('titulo', 'Nova Categoria')
    
@section('body')
    
    <div class="container text-center">
        <div class="card border">
            <div class="card-body">
                <h4>Insira uma nova Categoria</h4>
                <form action="{{route('inserir_departamento')}}" method="POST">
                    @csrf
                    <input type="text" name="nome" class="form-control mb-1" placeholder="Categoria">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                    <input type="cancel" class="btn btn-danger" value="Cancel">
                </form>
            </div>
        </div>
    </div>

@endsection