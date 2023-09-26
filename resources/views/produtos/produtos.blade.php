@extends('layouts.app')
@section('titulo', 'Produtos')
    
@section('body')

<div class="container">

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
                <tbody id="produtos_lista">
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" onclick="novoProduto()" data-target="#modal_inserir_produto">
    Novo Produto
    </button>

    <!-- Modal Inserir Produto -->
    <div class="modal fade" id="modal_inserir_produto" tabindex="-1" role="dialog" aria-labelledby="inserir_produtoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-center" id="inserir_produtoLabel">Cadastrar Produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- FORM -->
        <form class="form-horizontal" id="formProduto">
            <div class="modal-body">
                    <input type="text" name="nome" id="nomeInserir" class="form-control mb-1" placeholder="Produto">
                    <select class="form-control" name="categoria_id" id="categoria_idInserir"></select>
                    <input type="number" name="estoque" id="estoqueInserir" class="form-control mb-1" placeholder="Estoque">
                    <input type="number" name="preco" id="precoInserir" class="form-control mb-1" placeholder="Preço"> 
            </div>
            <div class="modal-footer">
                <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>    
        <!-- FORMEND -->
        </div>
    </div>
    </div>
    </div>

    <!-- Modal Editar Produto -->
    <div class="modal fade" id="editar_produto" tabindex="-1" role="dialog" aria-labelledby="editar_produtoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-center" id="editar_produtoLabel">Editar Produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- FORM -->
        <form class="form-horizontal" id="formEditarProduto">
            <div class="modal-body">
                    <input type="text" name="nome" id="nome" class="form-control mb-1" placeholder="Produto">
                    <select class="form-control" name="categoria_id" id="categoria_idEditar"></select>
                    <input type="number" name="estoque" id="estoque" class="form-control mb-1" placeholder="Estoque">
                    <input type="number" name="preco" id="preco" class="form-control mb-1" placeholder="Preço"> 
            </div>
            <div class="modal-footer">
                <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>    
        <!-- FORMEND -->
        </div>
    </div>
    </div>
    </div>
    

@endsection

@section('javascript')
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}"
        }
    })

    function novoProduto(){
        $('#nomeInserir').val('');
        $('#estoqueInserir').val('');
        $('#precoInserir').val('');
    }

    function carregarCategorias(){
        $.getJSON('/api/categorias', function(data){
            for(i = 0; i < data.length; i++){
                opcao = '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                $('#categoria_idInserir').append(opcao);
            }
        })
    }

    function carregarCategoriasEditar(){
        $.getJSON('/api/categorias', function(data){
            for(i = 0; i < data.length; i++){
                opcao = '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                $('#categoria_idEditar').append(opcao);
            }
        })
    }

    function montarLinha(p){
        var linha = '<tr><td>' + p.id + '</td><td>' + p.nome + '</td><td>' + p.estoque + '</td><td>€' + p.preco + '</td><td><i class="fas fa-edit text-primary" data-toggle="modal" onclick="editarProduto('+ p.id +')" data-target="#editar_produto"></i> | <i class="fas fa-times text-danger p-1" onclick="remover('+ p.id +')"></i></td></tr>';
        return linha;
    }

    function carregarProdutos(){
        $.getJSON('/api/produtos', function(produtos){
            for(i = 0; i < produtos.length; i++){
                linha = montarLinha(produtos[i]);
                $('#produtos_lista').append(linha);
            }
        })
    }

    function descarregarProdutos(){
        linhas = $('#produtos_lista>tr');
        linhas.remove();
    }

    // Inserindo Produto //

    function criarProduto() {
        prod = {nome: $('#nomeInserir').val(),
                categoria_id: $('#categoria_idInserir').val(),
                estoque: $('#estoqueInserir').val(),
                preco: $('#precoInserir').val()
                };
                $.post('/api/produtos', prod, function(data){
                    //produto = JSON.parse(data);
                    //linha = montarLinha(produto);
                    //$('#produtos_lista').append(linha);
                    descarregarProdutos();
                    carregarProdutos();
                });
    }

    function remover(id){
        $.ajax({
            type: "DELETE",
            url: "/api/produtos/" + id,
            context: this,
            success: function (){
                linhas = $('#produtos_lista>tr');
                e = linhas.filter(function(i, elemento){
                    return elemento.cells[0].textContent == id;
                });
                if (e)
                    e.remove();
            },
            error: function (){

            }
        })
    }

    $('#formProduto').submit( function(event){
        event.preventDefault();
        criarProduto();
        $('#modal_inserir_produto').modal('hide');
    })
    
    $(function(){
        carregarCategorias();
        carregarCategoriasEditar();
        carregarProdutos();
    })
    
</script>    
@endsection