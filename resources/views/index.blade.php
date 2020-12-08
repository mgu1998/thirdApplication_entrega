@extends('base')

@section('title')
Index Page
@endsection

@section('titlePart')
Hello world!
@endsection

@section('subtitle')
<h3>This is the second subtitle. h3</h3>
@parent
@endsection

@section('content')

@auth
<h1>eres un usuario autentificado</h1>
@endauth

@guest
<h1>eres un usuario invitado</h1>
@endguest

@isset($nombre)
    <h2>La variable $nombre tiene el valor {{ $nombre }}</h2>
@endisset

@if(isset($nombre))
    <h2>La variable $nombre tiene el valor {{ $nombre }}</h2>
@endif

@endsection