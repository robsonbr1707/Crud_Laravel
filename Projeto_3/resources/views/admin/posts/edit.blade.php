@extends('admin.layouts.app')

@section('title', 'Editar Registro')

@section('content')

    <style>
        
.rodape{
    bottom: 0;
    right: 0;
    left: 0;
    position: absolute;
    text-align: center;
}
    </style>

    <div class="caixa">

        <h1>Editando o Registro</h1>

        <form action=" {{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            
            @method('put')
            @include('admin.posts.partials.form')
        </form>
            
        <a href="{{ route('posts.index') }}" class="btn btn-dark">Voltar ao MENU</a>
    </div>
    
  

@endsection