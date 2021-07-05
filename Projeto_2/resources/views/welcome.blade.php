@extends('layout.main')

@section('title', 'Inicio')

@section('content')

    <div id="search-container" class="col-md-11 m-5 p-3 mb-2 bg-dark text-white">
        <h1>Busque Um Evento</h1>
        <form action="/" method="GET" class="p-3 mb-2 bg-dark text-white">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
        </form>
    </div>
    <div id="events-container" class="col-md-11 m-5 p-3 mb-2 bg-secondary text-dark">

        @if ($search)
            <h2>Buscando Por : {{ $search }} </h2> 
        @endif
       
    @if(count($events) == 0)
        <p>Não há eventos Disponiveis..</p>
    @else
        <h2 class="text-white">Proximos Eventos</h2>
        <p class="text-white">Veja Os Eventos Nos Proximos Dias</p>
    @endif

        <div id="cards-container" class="d-flex justify-content-evenly d-flex flex-wrap">
            @foreach ($events as $event)

            <div class="card col-md-2">
               <img src="/img/events/{{$event->image}}" alt="{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date"> Data Do Evento:<strong> {{ date('d/m/Y', strtotime($event->date)) }}</strong></p>
                    <h5 class="card-title"> {{ $event->title }} </h5>
                    <p class="card-participants">{{ count($event->users) }} Participantes </p>
                    <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
                </div>
            </div>
                
            @endforeach
         
        </div>
    </div>
@endsection