@extends('layout.layout')

@push('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush

@push('jquery')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
@endpush

@section('navbar')


    <h2>Todos os produtos</h2>
    <Form>
        <label for="input"></label>
        <input id="Pesquisar" name="q" type="text" placeholder="Digite o produto" autocomplete="off">
    <button type="submit">Pesquisar</button>
    <div id="teste"></div>
</Form>


<a class="btn" href="{{ route('create') }}">Criar</a>

@endsection

@section('content')
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Estoque</th>
            <th>Valor</th>
            <th>Descrição</th>
            <th>Atualizar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    @foreach($produtos as $p)
    <tbody>
        <tr>
            <td>{{$p['name']}}</td>
            <td>Quantidade: {{$p['stock']}}</td>
            <td>R$:{{$p['price']}}</td>
            <td>{{$p['description']}}</td>

            <td>
                <a href="{{ route('edit', $p['id']) }}" class="btn">Editar</a>
            </td>
            <td>
                <form action="{{ route('delete', $p['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    </tbody>
    

    @endforeach
</table>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $("#search-form").on("submit", function(e) {
            e.preventDefault
        })

        $("#Pesquisar").on('keyup', function() {
            let pesquisa = $(this).val()
            // console.log(pesquisa)
            if (pesquisa.length > 2) {

                $.ajax({
                    url: "{{ route('search') }}",
                    type: "GET",
                    data: {
                        q: pesquisa
                    },

                    success: function(pequisadb) {
                        let html = "<ul>";
                        pequisadb.forEach(produto => {
                            html += `<li>${produto.name}</li>`; // Corrigido aqui!
                        });
                        html += "</ul>";
                        $('#teste').html(html);
                    }
                })

            }
        })
    })
</script>
@endpush