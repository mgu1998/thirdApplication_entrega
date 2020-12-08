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
<form action="{{ url('backend/moneda') }}" method="post" id="createMonedaForm">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="nombremoneda">Nombre</label>
            <input type="string" maxlength="30" minlength="1" required class="form-control" id="nombremoneda" placeholder="moneda name" name="nombremoneda" value="{{ old('nombremoneda') }}">
        </div>
        <div class="form-group">
            <label for="simbolo">Simbolo</label>
            <input type="char" maxlength="6" minlength="1" required class="form-control" id="simbolo" placeholder="simbolo moneda" name="simbolo" value="{{ old('simbolo') }}">
        </div>
        <div class="form-group">
            <label for="pais">Pais</label>
            <input type="string" maxlength="30" minlength="1" required class="form-control" id="pais" placeholder="Pais moneda" name="pais" value="{{ old('pais') }}">
        </div>
        <div class="form-group">
            <label for="valormoneda">Valor €</label>
            <input type="decimal" maxlength="4" minlength="1" required class="form-control" id="valormoneda" placeholder="Valor €" name="valormoneda" value="{{ old('valormoneda') }}">
        </div>
        <div class="form-group">
            <label for="fechamoneda">fecha-moneda</label>
            <input type="date" required class="form-control" id="fechamoneda" name="fechamoneda" value="{{ old('fechamoneda') }}">

        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection