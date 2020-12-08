@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/moneda/' . $moneda->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('backend/moneda') }}" class="btn btn-primary">monedas</a>
                <a href="{{ url('backend/moneda/create') }}" class="btn btn-primary">Create moneda</a>
                <a href="#" data-id="{{ $moneda->id }}" data-name="{{ $moneda->nombremoneda }}" class="btn btn-danger" id="enlaceBorrar">Delete moneda</a>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nombre</td>
            <td>{{$moneda->nombremoneda}}</td>
        </tr>
        <tr>
            <td>Simbolo</td>
            <td>{{$moneda->simbolo}}</td>
        </tr>
        <tr>
            <td>pais</td>
            <td>{{$moneda->pais}}</td>
        </tr>
        <tr>
            <td>valor moneda</td>
            <td>{{$moneda->valormoneda}}</td>
        </tr>
        <tr>
            <td>fechamoneda</td>
            <td>{{$moneda->fechamoneda}}</td>
        </tr>
    </tbody>
</table>
@endsection