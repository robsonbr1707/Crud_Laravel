@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@csrf
        <div class="mb-3 col-md-7">
            <label for="image" class="form-label" >Escolha Uma Imagem</label>
            <input type="file" class="form-control" name="image" id="image" >
        </div>

        <div class="mb-3 col-md-5">
            <label for="title" class="form-label">Titulo Do Registro</label>
            <input type="text" class="form-control col-md-1" name="title" id="title" placeholder="Titulo" value=" {{ $post->title ?? old('title')}} ">
        </div>

        <div class="mb-3 col-md-5">
            <label for="content" class="form-label">Descrição Do Registro</label>
            <textarea class="form-control" name="content" id="content"  rows="3" placeholder="Descrição">{{ $post->content ?? old('content') }}</textarea>
            <button type="submit" class="btn btn-success col-md-5">Registrar</button>
        </div>
