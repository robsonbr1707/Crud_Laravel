<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
*{
    padding: 0;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}


body{
    background: rgb(212, 209, 209);
    
}


.card.mb-3{
    margin:40px auto;
    width: 80%;
    background: rgb(145, 144, 144);
}


.row.g-0{
    margin-left: 50px;
    padding: 8px;
    
}


.caixa{
    margin:50px auto;
    padding: 10px;
    width: 50%;
    background: grey;
}

.ola{
    color: green;
}


h4{
    text-align: center;
}

    </style>
    <title>@yield('title')</title>
</head>
<body>
    
    <div class="content">
        @yield('content')
    </div>
    
    <footer>
        <p style="text-align: center"> &copy; Robson Luiz</p>
    </footer>
</body>
</html>