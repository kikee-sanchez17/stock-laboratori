@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Tarea</h2>
        </div>
        <div>
            <a href="{{route('products.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{route('products.update',$product)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>CAS:</strong>
                    <input type="text" name="cas" class="form-control" placeholder="CAS" value="{{$product->cas}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Concentració:</strong>
                    <input type="text" name="concentracio" class="form-control" placeholder="Concentración" value="{{$product->concentracio}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Estat</strong>
                    <select name="estat" class="form-control" value="{{$product->estat}}">
                        <option value="solid">Sòlid</option>
                        <option value="liquid">Líquid</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Tipo de Concentración:</strong>
                    <select name="tipus_concentracio" class="form-control" value="{{$product->tipus_concentracio}}">
                    
                        <option value="%" @selected("%" == $product->tipus_concentracio)>%</option>
                        <option value="mols"@selected("mols" == $product->tipus_concentracio)>mols</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Capacitat:</strong>
                    <input type="text" name="capacitat" class="form-control" placeholder="Capacitat" value="{{$product->capacitat}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Caducitat:</strong>
                    <input type="date" name="caducitat" class="form-control" value="{{$product->caducitat}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Armari:</strong>
                    <input type="text" name="armari" class="form-control" placeholder="Armari" value="{{$product->armari}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Quantitat:</strong>
                    <input type="text" name="armari" class="form-control" placeholder="Armari" value="{{$product->quantitat}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualitzar</button>
            </div>
        </div>
    </form>
</div>
@endsection