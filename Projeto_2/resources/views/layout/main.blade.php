<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

    <title>@yield('title')</title>
    <style>

*{
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;

}

body{
    background: rgb(212, 209, 209);
}


.card{
    width: 22%;
    margin:20px 5px;
}


.card img{
    height: 350px;
}


#image-container img {
    height: 350px;
}


img{
    height:300px;
}


#info-container img{
    width: 20px;
    height: 20px;
}


.nav-item{
    font-size: 18px;
    margin: 5px;
}


.rodape{
    font-size: 18px;
    margin-top: 20px;
    text-align: center;
}

    </style>
</head>
<body>

    <header>              
        <nav class="navbar navbar-expand-lg navbar-light p-3 mb-2 bg-white text-dark">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">Inicio</a>
                </div>
    
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Eventos</a>
                    </li>
    
                    <li class="nav-item">
                        <a href="/events/create" class="nav-link">Criar Eventos</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">Meus Eventos</a>
                    </li>
    
                    <form action="/logout" method="POST" >
                        @csrf
                        <li class="nav-item">
                            <a href="/logout" class="nav-link" onclick="event.preventDefault();this.closest('form').submit()">Sair</a>
                        </li>
                    </form>
    
                @endauth
                @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                    </li>
    
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                        
                    </li>
                @endguest
    
                </ul>
            </div>

        </nav>
    </header>
    
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p class="p-3 mb-2 bg-success text-white" style="text-align: center;"> {{ session('msg') }} </p>

                @elseif(session('msg_del'))
                    <p class="p-3 mb-2 bg-danger text-white" style="text-align: center;"> {{ session('msg_del') }} </p>

                @elseif(session('msg_edit'))
                    <p class="p-3 mb-2 bg-primary text-white" style="text-align: center;"> {{ session('msg_edit') }} </p>

                @elseif(session('msg_confirm'))
                    <p class="p-3 mb-2 bg-success text-white" style="text-align: center;"> {{ session('msg_confirm') }} </p>

                @elseif(session('msg_exit'))
                    <p class="p-3 mb-2 bg-dark text-white" style="text-align: center;"> {{ session('msg_exit') }} </p>
                @endif

                @yield('content')
            </div>
        </div>
    </main>

    <footer>
        <p class="rodape">&copy; Robson Luiz </p>
    </footer>
</body>
</html>