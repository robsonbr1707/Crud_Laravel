@extends('layouts.app')

@section('title', 'Criação')
    
@section('content')

  <div class="container mt-5">
    <h1>Crie Um Novo Jogo</h1>
    <a href="{{route('jogos-index')}}" class="btn btn-dark">Voltar</a>
    <hr>
    <form action="{{ route('jogos-store') }}" method="POST">
    @csrf

      <div class="form-group">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" name="nome" placeholder="Digite Um Jogo">
        </div>
<br>
        <div class="form-group">
          <label for="categoria">Categoria:</label>
          <input type="text" class="form-control" name="categoria" placeholder="Digite Uma Categoria">
        </div>
<br>
        <div class="form-group">
          <label for="ano_criacao">Ano De Criação:</label>
          <input type="number" class="form-control" name="ano_criacao" placeholder="Digite O Ano De Criação">
        </div>
<br>
        <div class="form-group">
          <label for="valor">Valor:</label>
          <input type="number" class="form-control" name="valor" placeholder="Digite O Valor">
        </div>
        <br>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary">
        </div>
      </div>
    </form>
  </div>

@endsection