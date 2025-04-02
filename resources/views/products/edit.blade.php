@extends('layout.layout')


@section('navbar')
<h3>Editar Produtos</h3>
<button>
    <a style="text-decoration: none;" href="{{ route('index') }}">Voltar</a>
</button>
@endsection

@section('content')
        <form action="{{ route('update', $produto['id'] ) }}">
            <div>
                <label for="">Novo nome do produto</label>
                <input type="text" name='name' value="{{ $produto['name'] }}">
            </div>
            <div>
                <label for="">Novo numero em estoque</label>
                <input type="text" name='stock' value="{{ $produto['stock'] }}">
            </div>
            <div>
                <label for="">Novo Preço</label>
                <input type="text" name='price' value="{{ $produto['price'] }}">
            </div>
            <div>
                <label for="">Nova Descrição</label>
                <textarea type="text" name='description'>{{$produto['description']}}</textarea>
            </div>
            <button type="submit">Salvar</button>

        </form>

@endsection
