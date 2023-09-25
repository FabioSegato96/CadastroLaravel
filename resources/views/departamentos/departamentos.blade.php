@extends('layouts.app')
@section('titulo', 'Categorias')
    
@section('body')


    
    <div class="container">

        @if (count($cats) > 0)
        <div class="card border">
            <div class="card-body">
                <h4>Categorias</h4>
                <table class="table table-ordened table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cats as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->nome}}</td>
                                <td>
                                    <a href="{{route('editar_departamento', $cat->id)}}"><i class="fas fa-edit p-1"></i></a>
                                    <a href="{{route('apagar_departamento', $cat->id)}}"><i class="fas fa-times text-danger p-1"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @else
            <h5 class="text-center">Não existem registros.</h5>    
        @endif

        <div class="text-center mt-3">
            <a class="btn btn-primary" href="{{route('novo_departamento')}}">Novo Departamento</a>
        </div>
    </div>    

@endsection