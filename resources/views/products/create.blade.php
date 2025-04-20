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
            <input class="text" type="text" name='name' placeholder="Digite o nome" value="{{ old('name') }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="conteudo">
            <label for="stock">Stock</label>
            <input class="text" type="text" name='stock' placeholder="Quantidade em estoque" value="{{ old('stock') }}">
            @error('stock')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="conteudo">
            <label for="price">Preço</label>
            <input class="text" type="text" name='price' placeholder="Campo do preço" value="{{ old('price') }}">
            @error('price')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="conteudo">
            <label for="description">Descrição</label>
            <textarea class="text" style="resize: none;" type="text" name='description' placeholder="Descrição do produto">{{ old('description') }}</textarea>
            @error('description')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>
</div>
@endsection