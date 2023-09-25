@extends('layouts.app')
@section('titulo', 'Inicio')
    
@section('body')

<div class="container">

    @if (count($prods) > 0)
    <div class="card border">
        <div class="card-body">
            <h4>Produtos</h4>
            <table class="table table-ordened table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Estoque</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prods as $prod)
                        <tr>
                            <td>{{$prod->id}}</td>
                            <td>{{$prod->nome}}</td>
                            <td>{{$prod->estoque}}</td>
                            <td>€ {{$prod->preco}}</td>
                            <td>
                                <a href="{{route('editar_produto', $prod->id)}}"><i class="fas fa-edit p-1"></i></a>
                                <a href="{{route('apagar_produto', $prod->id)}}"><i class="fas fa-times text-danger p-1"></i></a>
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
        <a class="btn btn-primary" href="{{route('novo_produto')}}">Novo Produto</a>
    </div>
</div>
    

@endsection