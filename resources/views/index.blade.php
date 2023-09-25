@extends('layouts.app')
@section('titulo', 'Inicio')
    
@section('body')
    
    <div class="jumbotron bg-light border-secondary border">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary p-5">
                    <div class="card-body">
                        <h4 class="card-title text-center">Cadastro de Produtos</h4>
                        <p class="card-text lead">Aqui você pode cadastrar todos os seus produtos.</p>
                        <div class="text-center">
                            <a href="{{route('produtos')}}" class="btn btn-primary text-center">Cadastre Produtos</a>
                        </div>
                    </div>
                </div>
                <div class="card border border-primary p-5">
                    <div class="card-body">
                        <h4 class="card-title text-center">Cadastro de Departamentos</h4>
                        <p class="card-text lead">Cadastre os Departamentos antes de cadastrar os Produtos.</p>
                        <div class="text-center">
                            <a href="{{route('departamentos')}}" class="btn btn-primary text-center">Cadastre Departamentos</a>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection