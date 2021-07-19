@extends ('layouts.layout')

@section('title', 'Inicio')

@section('content')

@if($search)
    <h2 class="text-start">Buscando Por: {{$search}}</h2>    
@endif

@if(count($registros) == 0)
    <p class="text-center fs-4">Nenhum registro encontrado</p>
@endif


    {{---------Menssagens de Sucesso-----------}}
@if(session('msg_create'))
    <p class="p-3 mb-2 bg-success text-white text-center">{{session('msg_create')}}</p>

@elseif(session('msg_up'))
    <p class="p-3 mb-2 bg-primary text-white text-center">{{session('msg_up')}}</p>

@elseif(session('msg_delete'))
    <p class="p-3 mb-2 bg-danger text-white text-center">{{session('msg_delete')}}</p>
@endif;

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Editar / Excluir</th>
                </tr>
            </thead>
        @foreach ($registros as $item)
            <tbody>
                <tr>                    
                    <th scope="row">
                        <img src="{{ url("storage/{$item->image}") }}" style="max-width:80px;height:80px;" alt="{{$item->nome}}">
                    </th>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->descricao}}</td>
                    <td>
                        <form action="{{route('index.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="d-grid gap-2 d-md-block">
                                <a href="{{ route('index.edit', $item->id)}}" class="btn btn-primary">Editar</a>
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
        </table>
@endsection
