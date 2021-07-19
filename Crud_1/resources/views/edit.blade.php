@extends ('layouts.layout')

@section('title', 'Editar')

@section('content')

    <form action="/update/{{$registros->id}}" method="POST" class="form_create_edit" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2>Editar Registro {{$registros->id}}</h2>

        <div class="mb-3">
            <label class="form-label"></label>
            <input type="text" placeholder="Nome" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ $registros->nome }}">
            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label"></label>
            <input type="text" placeholder="email@exemplo.com" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $registros->email }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label"></label>
            <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror">
                {{$registros->descricao}}
            </textarea>
            @error('descricao')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <input type="submit" name="submit" class="btn btn-info">
    </form>

@endsection