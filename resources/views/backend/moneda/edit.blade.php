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
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="{{ url('backend/moneda') }}" class="btn btn-primary">monedas</a>
                <a href="#" data-id="{{ $moneda->id }}" data-name="{{ $moneda->nombremoneda }}" class="btn btn-danger" id="enlaceBorrar">Delete moneda</a>
            </div>
        </div>
    </div>
</div>
@if(session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <h2>Error ...</h2>
            </div>
        </div>
    </div>
@endif
<form role="form" action="{{ url('backend/moneda/' . $moneda->id) }}" method="post" id="editMonedaForm" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" maxlength="40" minlength="1" required class="form-control" id="nombre" placeholder="Nombre de la Moneda" name="nombre" value="{{ old('nombre', $moneda->nombre) }}">
        </div>
    <div class="form-group">
        <label for="simbolo">Simbolo</label>
        <input type="text" maxlength="15" minlength="1" required class="form-control" id="simbolo" placeholder="Simbolo de la Moneda" name="simbolo" value="{{ old('simbolo', $moneda->simbolo) }}">
    </div>
    <div class="form-group">
        <label for="pais">Pais</label>
        <input type="text" maxlength="100" minlength="1" required class="form-control" id="pais" placeholder="Pais de la Moneda" name="pais" value="{{ old('pais', $moneda->pais) }}">
    </div>
    <div class="form-group">
        <label for="valor">Valor</label>
        <input type="text" maxlength="20" minlength="1" required class="form-control" id="valor" placeholder="Valor de la Moneda" name="valor" value="{{ old('valor', $moneda->valor) }}">
    </div>
    <div class="form-group">
        <label for="fecha">Fecha de entrada en vigor</label>
        <input type="date" required class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $moneda->fecha) }}">
    </div>
    </div>
    
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection