<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/products/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products/main-content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dark-mode.css') }}">

    <title>Produtos</title>
</head>

<body>
    <nav id="sidebar">
        <div id="sidebar_content">
            <div id="user">
                <img src="{{ asset('img/avatar.webp')}}" id="user_avatar" alt="avatar">
                <p id="user_infos">
                    <span class="item-description">
                        fulano de tal
                    </span>
                    <span class="item-description">
                        lorem Ipsum
                    </span>
                </p>
            </div>
            <ul id="side_items">
                <li class="side-item active">
                    <a href="../users/profile">
                        <i class="fa-regular fa-user"></i>
                        <span class="item-description">
                            Perfil
                        </span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="{{ route('index-products') }}">
                        <i class="fa-solid fa-house"></i>
                        <span class="item-description">
                            Home
                        </span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="{{ route('create-products') }}">
                        <i class="fa-solid fa-plus"></i>
                        <span class="item-description">
                            Criar
                        </span>
                    </a>
                </li>
            </ul>
            <button id="open_btn">
                <i id="open_btn_icon" class="fa-solid fa-bars"></i>
            </button>
        </div>

        <div class="btns">
            <button class="btn" id="config_btn">
                <i class="fa-solid fa-gear"></i>
                <span class="item-description">
                    configuracoes
                </span>
            </button>
            <button class="btn" id="dark_btn">
                <i class="fa-solid fa-moon"></i>
                <span class="item-description">
                    dark mode
                    <i class="fa-solid fa-toggle-off"></i>
                </span>
            </button>
            <button class="btn" id="logout_btn">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span class="item-description">
                    logout
                </span>
            </button>
        </div>
    </nav>
    <main>
        <div class="navbar">
            @yield('navbar')
        </div>
        <div class=" content">
            @csrf
            @yield('content')
        </div>
        <footer>Primeiro Projeto Laravel</footer>
    </main>
    <script>
        document.getElementById('open_btn').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle("open-sidebar")
        })

        document.getElementById('dark_btn').addEventListener('click', function() {
            document.body.classList.toggle("dark-mode")
            document.getElementById('dark_btn').children[1].children[0].classList.toggle("fa-toggle-on")
        })
    </script>
</body>

@stack('script')

</html>