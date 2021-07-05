@extends('admin.layouts.app')

@section('title',"Detalhes Do Registro")

@section('content')
<style>
    .card{
    text-align: center;
    background: rgb(169, 202, 198);

}


.card img{
    margin:10px auto;
    width: 68%;
    border-bottom: 5px solid black;
    background: rgb(87, 87, 87);
    padding: 2px;
}


.card-body{
    margin: auto;
    width: 30%;
    background: rgb(69, 122, 122);
    border: 1px solid black;
}

.rodape{

    text-align: center;
}

</style>
    <div class="card">
        <h2 class="card-title p-3 mb-2 bg-secondary text-white">Detalhes Meno Do Registro</h2>

        <div class="card-body">
            <h4 class="card-title p-3 mb-2 bg-primary text-white">{{ $post->title}}</h4>
            <img src="{{ url("storage/{$post->image}")}}" class="card-img-top">
            <p class="card-text p-3 mb-2 bg-dark text-white">{{ $post->content}}</p>

            <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                @csrf
                @method('DELETE')
        
                @auth
                    <div class="d-grid gap-2 d-md-block">
                        <a href="{{ route('posts.index') }}" class="btn btn-primary">Voltar ao MENU</a>
                        <button type="submit" class="btn btn-danger">Deletar o Registro</button>
                    </div>
                @endauth
            </form>
        </div>
    </div>    
   
@endsection