@extends('layouts.app')

@section('title', 'Edição')
    
@section('content')

  <div class="container mt-5">
    <h1>Editar Jogo</h1>
    <a href="{{route('jogos-index')}}" class="btn btn-dark">Voltar</a>
    <hr>
    <form action="{{ route('jogos-update',['id'=>$jogos->id]) }}" method="POST">
    @csrf
    @method('PUT')
      <div class="form-group">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" name="nome" value="{{$jogos->nome}}" placeholder="Digite Um Jogo">
        </div>
<br>
        <div class="form-group">
          <label for="categoria">Categoria:</label>
          <input type="text" class="form-control" name="categoria" value="{{$jogos->categoria}}" placeholder="Digite Uma Categoria">
        </div>
<br>
        <div class="form-group">
          <label for="ano_criacao">Ano De Criação:</label>
          <input type="number" class="form-control" name="ano_criacao" value="{{$jogos->ano_criacao}}" placeholder="Digite O Ano De Criação">
        </div>
<br>
        <div class="form-group">
          <label for="valor">Valor:</label>
          <input type="number" class="form-control" name="valor" value="{{$jogos->valor}}" placeholder="Digite O Valor">
        </div>
        <br>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
        </div>
      </div>
    </form>
  </div>

@endsection