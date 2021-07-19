<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title> @yield('title') </title>
    <style>
      .table{
        width: 60%;
        margin:20px auto;
      }

       .form_create_edit{
        width: 40%;
        margin: auto;
        text-align: left;
      }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index.home')}}">Hello World</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{route('index.home')}}">Home</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{route('index.create')}}">Criar Registro</a>
                </li>
              </ul>
              
              <form class="d-flex mb-2" method="GET" action="/">
                <input class="form-control me-2" type="search" placeholder="Pesquisar" name="search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
              </form>

            </div>
          </div>
    </nav>

    @yield('content')

</body>
</html>