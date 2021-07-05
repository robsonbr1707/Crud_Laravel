@extends('admin.layouts.app')

@section('title', 'Criar Novo Registro')
    
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

        <h1 class="display-5">Cadastrar Novo Registro</h1>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class=" g-3">
            @include('admin.posts.partials.form')
        </form>
            
        <a href="{{ route('posts.index') }}" class="btn btn-dark">Voltar ao MENU</a>

    </div>

    
    
@endsection