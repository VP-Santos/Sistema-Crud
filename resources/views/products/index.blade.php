@extends('layout.layout')

<link rel="stylesheet" href="{{ asset('css/products/index.css') }}">

@section('navbar')
<h2>Todos os produtos</h2>
<Form>
    <label for="input"></label>
    <input id="pesquisarInput" name="query" type="text" placeholder="Digite o produto" autocomplete="off">
    <button id="pesquisarButton" type="button">
        <i class="fa-solid fa-magnifying-glass"></i>
        <span>Pesquisar</span>
    </button>
    <div id="sugestaoDiv" class="sugestao"></div>
</Form>

<a id="create-btn" href="{{ route('create-products') }}">
    <i class="fa-solid fa-plus"></i>
    <span>Criar</span>
</a>
@endsection

@section('content')
<div id="tabela-container">
    <table id="ProductsTable">
        <thead id="thead">
            <tr>
                <th>Nome</th>
                <th>Estoque</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Atualizar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach($produtos as $p)
            <tr>
                <td>{{$p['name']}}</td>
                <td>Quantidade: {{$p['stock']}}</td>
                <td>R$:{{$p['price']}}</td>
                <td>{{$p['description']}}</td>
                <td>
                    <a id="edit-btn" href="{{ route('edit-products', $p['id']) }}" >
                        <i class="fa-solid fa-pen"></i>
                        <span>Editar</span>
                    </a>
                </td>
                <td>
                    <form action="{{ route('delete-products', $p['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="delete-btn" type="submit">
                            <i class="fa-solid fa-trash"></i>
                            <span>Excluir</span>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('script')
<script>
    function debounce(func, timeout = 300) {
        let timer;

        return (...args) => {
            clearTimeout(timer);

            timer = setTimeout(() => {

                func.apply(this, args);


            }, timeout);
        };
    }

    $(document).ready(function() {

        function buscar() {
            let pesquisa = $("#pesquisarInput").val()

            if (pesquisa == '') {

                $('#pesquisarButton').click();

                $("#sugestaoDiv").hide();

                return;
            }

            $.ajax({
                url: "{{ route('search-products') }}",
                type: "GET",
                data: {
                    query: pesquisa
                },
                success: function(pequisadb) {

                    html = '';
                    pequisadb.forEach(produto => {
                        html += `<div class="indicar">${produto.name}</div>`; // Corrigido aqui!
                    });
                    $('#sugestaoDiv').html(html).show();
                }
            })
            $('#sugestaoDiv').hide();
        }

        const debounceBusca = debounce(buscar, 500);
        $("#pesquisarInput").on('keyup', debounceBusca)


        //barra de sugestao
        $('#sugestaoDiv').on('click', 'div', function() {
            $('#pesquisarInput').val($(this).text());
            $('#sugestaoDiv').hide();
        })

        //evento do botão de pesquisa
        $("#pesquisarButton").on('click', function(e) {
            e.preventDefault();
            let pesquisa = $("#pesquisarInput").val();

            $.ajax({
                url: "{{ route('search-products') }}",
                type: "GET",
                data: {
                    query: pesquisa
                },
                success: function(tabela) {

                    let html = ""

                    if (tabela.length === 0) {
                        html = `<tr><td colspan="6">Nenhum produto encontrado.</td></tr>`;
                    } else {
                        tabela.forEach(produto => {
                            html += `<tr>
                        <td>${produto.name}</td>
                        <td>Quantidade: ${produto.stock}</td>
                        <td>R$: ${produto.price}</td>
                        <td>${produto.description}</td>
                        <td><a href="" class="btn">Editar</a></td>
                        <td><a href="" class="btn">Editar</a></td>
                    </tr>`;
                        });
                    }

                    $('#tbody').html(html);
                },


            })

        })


    })
</script>
@endpush