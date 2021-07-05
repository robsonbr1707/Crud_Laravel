@extends('admin.layouts.app')

@section('title', 'Listagem-Posts')

@section('content')

@if (session('msg'))
        <h4 class="p-3 mb-2 bg-success text-white">{{ session('msg') }}</h4>
@elseif(session('msg_del'))
        <h4 class="p-3 mb-2 bg-danger text-white"> {{ session('msg_del')}}</h4>
@endif

    <nav class="navbar navbar-expand-lg navbar-light bg-light  navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                        <li class="nav-item"><a href="/register" class="nav-link">Cadastra-Se</a></li>
                        <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                    @endguest

                    <li class="nav-item"><a class="nav-link active" href="{{ route('posts.index') }}">Home</a></li>

                    @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('posts.create') }}">Criar Um Registro</a></li>

                    <form action="/logout" method="POST">
                        @csrf
                        <li class="nav-item"><a class="nav-link" href="/logout" onclick="event.preventDefault();this.closest('form').submit()">Sair</a></li>
                    </form>
                    @endauth
                </ul>
            </div>  
            
            <form action=" {{ route('posts.search') }} " method="POST" >
                @csrf
                <div class="input-group mb-3">
                    <input type="search" name="search" id="search" placeholder="Pesquise Algo" class="form-control ">
                    <button type="submit" class="btn btn-primary">Enviar</button> 
                </div>  
            </form>
           
        </div>   
    </nav>

@foreach ($posts as $item)
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-3">
                <img class="card-img-top" src="{{ url("storage/{$item->image}") }}" alt="{{ $item->title }}" style="max-width:150px;">
            </div>

            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title fs-2 p-3 mb-2 bg-secondary text-white "> {{ $item->title }} </h1>
                    <p class="card-text p-3 mb-2 bg-dark text-white">Descrição: {{ $item->content }} </p>
                    <div class="d-grid gap-2 d-md-block">
                        <a href="{{ route('posts.show', $item->id) }}" class="btn btn-secondary">Veja mais </a>
                        <a href="{{ route('posts.edit', $item->id ) }}" class="btn btn-warning">Editar</a>
                    </div>       
                </div>
            </div>
        </div>    
    </div>
    <hr>
@endforeach
    @if(count($posts) >= 1)

        {{ $posts->links() }}
  
    @else
        <h5 class="p-3 mb-2 bg-light text-dark" style="text-align: center;">Nenhum Registro Encontrado</h5>
    @endif

@endsection