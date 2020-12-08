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
<form role="form" action="{{ url('backend/moneda/' . $moneda->id) }}" method="post" id="editMonedaForm">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="form-group">
            <label for="nombremoneda">nombre</label>
            <input type="string" maxlength="30" minlength="2" required class="form-control" id="nombremoneda" placeholder="moneda name" name="nombremoneda" value="{{ old('nombremoneda', $moneda->nombremoneda) }}">
        </div>
    <div class="form-group">
        <label for="simbolo">simbolo</label>
        <input type="char" maxlength="6" minlength="1" required class="form-control" id="simbolo" placeholder="simbolo" name="simbolo" value="{{ old('simbolo', $moneda->simbolo) }}">
    </div>
    <div class="form-group">
        <label for="pais">Pais</label>
        <input type="string" maxlength="30" minlength="1" required class="form-control" id="pais" placeholder="Pais" name="pais" value="{{ old('pais', $moneda->pais) }}">
    </div>
    <div class="form-group">
        <label for="valormoneda">Valor €</label>
        <input type="decimal" maxlength="4" minlength="1" required class="form-control" id="valormoneda" placeholder="valor" name="valormoneda" value="{{ old('valormoneda', $moneda->valormoneda) }}">
    </div>
    <div class="form-group">
        <label for="fechamoneda">fechamoneda</label>
    <input type="date" required class="form-control" id="fechamoneda" name="fechamoneda" value="{{ old('fechamoneda', $moneda->fechamoneda) }}">    
    </div>
    <!-- /.card-body -->
    </div>  
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection