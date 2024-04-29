@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-black">Información del Producto</h2>
        </div>
    </div>
    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr>
                <th>CAS</th>
                <th>Concentració</th>
                <th>Tipus Concentració</th>
                <th>Estat</th>
                <th>Capacitat</th>
                <th>Caducitat</th>
                <th>Armari</th>
                <th>Quantitat</th>
            </tr>
            <tr>
                <td>{{$product->cas}}</td>
                <td>{{$product->concentracio}}</td>
                <td>{{$product->tipus_concentracio}}</td>
                <td>{{$product->estat}}</td>
                <td>{{$product->capacitat}}</td>
                <td>{{$product->caducitat}}</td>
                <td>{{$product->armari}}</td>
                <td>{{$product->quantitat}}</td>
            </tr>
        </table>
    </div>
    <div class="col-12 mt-4">
    <form action="{{ route('consums.store') }}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <div class="form-group">
        <label for="quantitat">Cantidad a retirar:</label>
        <input type="number" class="form-control" id="quantitat" name="quantitat" placeholder="Ingrese la cantidad">
    </div>
    <button type="submit" class="btn btn-primary">Retirar</button>
    @if(Session::has('error'))
    <div class="alert alert-danger mb-4">
        <strong>{{ Session::get('error') }}</strong>
    </div>
    @endif
</form>

    </div>
</div>

@endsection
