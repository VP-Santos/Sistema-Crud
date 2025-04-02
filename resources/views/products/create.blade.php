@extends('layout.layout')

@section('navbar')
<h3>Criar um novo produto</h3>
<button>
    <a style="text-decoration: none;" href="{{ route('index') }}">Voltar</a>
</button>
@endsection

@section('content')
<form action="{{ route('store') }}" method="POST">
    @csrf

    <div>
        <label for="name">Nome do produto</label>
        <input type="text" name='name' placeholder="Digite o Nome">
    </div>
    <div>
        <label for="stock">Stock</label>
        <input type="text" name='stock' placeholder="estoque">
    </div>
    <div>
        <label for="price">Preço</label>
        <input type="text" name='price' placeholder="preço">
    </div>
    <div>
        <label for="description">Descrição</label>
        <textarea style="resize: none;" type="text" name='description' placeholder="Descrição"></textarea>
    </div>
    <button type="submit">Salvar</button>

</form>
@endsection