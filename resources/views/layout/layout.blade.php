<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @stack('jquery')
    @stack('css')
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <title>Produtos</title>
</head>


<body>
    <div class="navbar">
        @yield('navbar')
    </div>
    <div class="centro">
        <div style="margin: 20px;">
            @if (session('mensagem'))
            <div class="alert alert-success">
                {{ session('mensagem') }}
            </div>
            @endif
            @csrf
            @yield('content')
        </div>
    </div>
    <footer>Primeiro Projeto Laravel</footer>
</body>

@stack('script')

</html>