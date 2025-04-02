@extends('layout.layout')

@section('navbar')
<h3>Todos os produtos</h3>
<button>
    <a style="text-decoration: none;" href="{{ route('create') }}">Criar produto

    </a>
</button>
<Form>
    <label for="input"></label>
    <input type="text" placeholder="Digite o produto">
    <button>Pesquisar</button>
</Form>
@endsection

@section('content')
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>estoque</th>
            <th>valor</th>
            <th>descrição</th>
        </tr>
    </thead>
    @foreach($produtos as $p)
    <tbody>
        <tr>
            <td>{{$p['name']}}</td>
            <td>{{$p['stock']}}</td>
            <td>{{$p['price']}}</td>
            <td>{{$p['description']}}</td>

            <td>
                <button><a style="text-decoration: none;" href="{{ route('edit', $p['id']) }}">editar</a></button>
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