@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Producto</h2>
        </div>
        <div>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>¡Ups!</strong> Algo salió mal:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>CAS:</strong>
                    <input type="text" name="cas" class="form-control" placeholder="CAS">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Concentració:</strong>
                    <input type="text" name="concentracio" class="form-control" placeholder="Concentración">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Estat</strong>
                    <select name="estat" class="form-control">
                        <option value="solid">Sòlid</option>
                        <option value="liquid">Líquid</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Tipo de Concentración:</strong>
                    <select name="tipus_concentracio" class="form-control">
                        <option value="%">%</option>
                        <option value="mols">mols</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Capacitat:</strong>
                    <input type="text" name="capacitat" class="form-control" placeholder="Capacidad">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Caducitat:</strong>
                    <input type="date" name="caducitat" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Armari:</strong>
                    <input type="text" name="armari" class="form-control" placeholder="Armario">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection
