@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="{{ url('backend/moneda') }}" class="btn btn-primary">monedas</a>
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
<form role="form" action="{{ url('backend/moneda') }}" method="post" id="createMonedaForm">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" maxlength="40" minlength="1" required class="form-control" id="nombre" placeholder="Nombre de la Moneda" name="nombre" value="{{ old('nombre') }}">
        </div>
        <div class="form-group">
            <label for="simbolo">Simbolo</label>
            <input type="text" maxlength="5" minlength="1" required class="form-control" id="simbolo" placeholder="Simbolo de la Moneda" name="simbolo" value="{{ old('simbolo') }}">
        </div>
        <div class="form-group">
            <label for="pais">Pais</label>
            <input type="text" maxlength="40" minlength="1" required class="form-control" id="pais" placeholder="Pais de la Moneda" name="pais" value="{{ old('pais') }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor en Euros</label>
            <input type="number" step="any" required class="form-control" id="valor" placeholder="Valor de la Moneda" name="valor" value="{{ old('valor') }}">
        </div>
         <div class="form-group">
            <label for="fecha">Fecha de entrada en vigor</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}">
        </div>
       
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection