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

    <form action="{{ route('update', $produto['id'] ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="conteudo">
            <label for="">Novo nome do produto</label>
            <input class="text" type="text" name='name' value="{{ $produto['name'] }}">
        </div>
        <div class="conteudo">
            <label for="">Novo numero em estoque</label>
            <input class="text" type="text" name='stock' value="{{ $produto['stock'] }}">
        </div>
        <div class="conteudo">
            <label for="">Novo Preço</label>
            <input class="text" type="text" name='price' value="{{ $produto['price'] }}">
        </div>
        <div class="conteudo">
            <label for="">Nova Descrição</label>
            <textarea class="text" type="text" name='description'>{{$produto['description']}}</textarea>
        </div>
        <div>
            <button>Salvar</button>
        </div>

    </form>
</div>

@endsection