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
            <th scope="col">id</th>
            <th scope="col">nombre</th>
            <th scope="col">simbolo</th>
            <th scope="col">pais</th>
            <th scope="col">valor</th>
            <th scope="col">fecha</th>
            <th scope="col">show</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($monedas as $moneda)
        <tr>
            <td scope="row">{{ $moneda->id }}</td>
            <td>{{ $moneda->nombre }}</td>
            <td>{{ $moneda->simbolo }}
            <td>{{ $moneda->pais }}</td>
            <td>{{ $moneda->valor }}</td>
            <td>{{ date('d-m-Y', strtotime($moneda->fecha)) }}</td>
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