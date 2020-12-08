@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('backend/moneda/create') }}" class="btn btn-primary">Create moneda</a>
            </div>
        </div>
    </div>
</div>

<!--
op -> store, update, destroy
r -> negativo, 0, positivo (acierto)
id -> id del elemento afectado
-->

@if(session()->has('op'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif

{{--
@if(Session::get('op') !== null)
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            moneda created successfully 2: {{ Session::get('id') }}
        </div>
    </div>
</div>
@endif
--}}

<table class="table table-hover">
    <thead>
        <tr>
            <th>#id</th>
            <th>Nombre</th>
            <th>Simbolo</th>
            <th>Pais</th>
            <th>Valor €</th>
            <th>fecha</th>
            <th>show</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($monedas as $moneda)
        <tr>
            <td>{{ $moneda->id }}</td>
            <td>{{ $moneda->nombremoneda }}</td>
            <td>{{ $moneda->simbolo }}</td>
            <td>{{ $moneda->pais }}</td>
            <td>{{ $moneda->valormoneda }}</td>
            <td>{{ $moneda->fechamoneda }}</td>
            <td><a href="{{ url('backend/moneda/' . $moneda->id) }}">show</a></td>
            <td><a href="{{ url('backend/moneda/' . $moneda->id . '/edit') }}">edit</a></td>
            <td><a href="#" data-id="{{ $moneda->id }}" class="enlaceBorrar" >delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<form id="formDelete" action="{{ url('backend/moneda') }}" method="post">
    @method('delete')
    @csrf
</form>
@endsection