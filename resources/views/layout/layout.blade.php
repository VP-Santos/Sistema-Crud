<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/produtos.css">
    <title>Produtos</title>
</head>


<body style="max-width: 100%; max-height: 100%;  background-color: gray;">
    <div>

        <div>

            <div>
              @yield('navbar')
            </div>

            <div>
                @csrf
               @yield('content')
            </div>
            <div>
                <footer>Primeiro Projeto Laravel</footer>
            </div>
        </div>
    </div>
</body>

</html>