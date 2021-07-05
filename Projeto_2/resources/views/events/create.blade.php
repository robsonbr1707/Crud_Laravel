@extends('layout.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie Seu Evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem Do Evento:</label>
            <input type="file" id="image" name="image" class="from-control-file">
        </div>

        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome Do Evento">
        </div>

        <div class="form-group">
            <label for="date">Data Do Evento:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>

        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local Do Evento">
        </div>

        <div class="form-group">
            <label for="title">O Evento É Privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>

        <div class="form-group">
            <label for="title">Descrição Do Evento</label>
            <textarea name="description" id="description" class="form-control" placeholder="Escreva Algo"></textarea>
        </div>

        <div class="form-group">
            <label for="title">Adicione Itens de infraestrutura:</label>

            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras">Cadeiras
            </div>

            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco">Palco
            </div>

            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja Gratis">Cerveja Gratis
            </div>

            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food">Open Food
            </div>

        </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>

@endsection