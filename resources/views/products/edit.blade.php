@extends('layout.layout')

@push('css')
<link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
@endpush

@section('navbar')
<h2>Editar Produtos</h2>

<a class="btn" style="text-decoration: none;" href="{{ route('index') }}">Voltar</a>
@endsection

@section('content')
<div>

    <!-- corpo do formulario -->
    <form action="{{ route('update', $produto['id'] ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="conteudo">
            <label for="input">Novo nome do produto</label>
            <input class="text" type="text" name='name' value="{{ old('name', $produto->name) }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="conteudo">
            <label for="input">Novo numero em estoque</label>
            <input class="text" type="text" name='stock' value="{{ old('stock', $produto->stock) }}">
            @error('stock')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="conteudo">
            <label for="input">Novo Preço</label>
            <input class="text" type="text" name='price' value="{{ old('price', $produto->price) }}">
            @error('price')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="conteudo">
            <label for="textarea">Nova Descrição</label>
            <textarea class="text" type="text" name='description'>{{ old('description', $produto->description) }}</textarea>
            @error('description')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <button>Salvar</button>
        </div>

    </form>
</div>

@endsection