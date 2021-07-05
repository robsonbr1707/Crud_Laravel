@extends('layout.main')

@section('title', $event->title)
    
@section('content')

<div class="col-md-8 offset-md-2">
    <div class="row">
        <div id="image-container " class="col-md-6">
            <img class="img-fluid" style="height: 400px;" src="/img/events/{{ $event->image }}" alt="{{$event->title}}">
        </div>

        <div id="info-container" class="col-md-6">
            <h1>{{ $event->title }}</h1>
            <p class="event-city"> <i> <img src="/img/imagens/local.png" alt=""> </i> {{ ucwords($event->city) }}</p>

            <p><i> <img src="/img/imagens/calendario.png"> </i> {{ date('d/m/Y', strtotime($event->date)) }}</p>

            <p class="events-participants"><i> <img src="/img/imagens/user.png"> </i>{{ count($event->users) }} participantes</p>

            <p class="event-owner"><i> <img src="/img/imagens/star.png"> </i> {{ ucwords($eventOwner['name']) }} </p>

            @if(!$hasUserJoined)
                <form action="/events/join/{{ $event->id }}" method="POST">
                    @csrf
                    <a href="/events/join/{{ $event->id }}" class="btn btn-primary" id="event-submit" onclick="event.preventDefault();this.closest('form').submit();">Confirmar presença</a>
                </form>
            @else
                <p class="already-joined-msg">Você ja está participando do evento!</p>
            @endif
            <h3>O Evento Conta Com:</h3>
            <ul class="items-list">
                @foreach ($event->items as $item)
                    <ul class="nav flex-column">
                        <li class="nav-item"> <i> <img src="/img/imagens/circulo.png"> </i> {{ $item }} </li>
                    </ul>
                @endforeach
            </ul>
        </div>
        <div class="col-md-5" id="description-container">
            <h3>Sobre o Evento</h3>
            <p class="p-3 mb-5 bg-dark text-white">{{ucwords($event->description)}}</p>
        </div>
    </div>
</div>

@endsection