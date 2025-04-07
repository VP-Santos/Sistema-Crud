@extends('layout.layout')

@push('css')
<link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
@endpush

@section('navbar')
<h2>Criar um novo produto</h2>

<a class="btn" style="text-decoration: none;" href="{{ route('index') }}">Voltar</a>
@endsection

@section('content')
<div>
    <form action="{{ route('store') }}" method="POST">
        @csrf

        <div class="conteudo">
            <label for="name">Nome do produto</label>
            <input class="text" type="text" name='name' placeholder="Digite o Nome">
        </div>
        <div class="conteudo">
            <label for="stock">Stock</label>
            <input class="text" type="text" name='stock' placeholder="estoque">
        </div>
        <div class="conteudo">
            <label for="price">Preço</label>
            <input class="text" type="text" name='price' placeholder="preço">
        </div>
        <div class="conteudo">
            <label for="description">Descrição</label>
            <textarea class="text" style="resize: none;" type="text" name='description' placeholder="Descrição"></textarea>
        </div>
        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>
</div>
@endsection