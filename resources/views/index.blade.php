@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">CRUD de Productes</h2>
        </div>
        <div>
            <a href="" class="btn btn-primary">Crear Producte</a>
        </div>
    </div>
    @if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{Session::get('success')}}</strong>
    </div>
    @endif
    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>CAS</th>
                <th>Concentració</th>
                <th>Tipus Concentració</th>
                <th>Estat</th>
                <th>Capacitat</th>
                <th>Caducitat</th>
                <th>Armari</th>
            </tr>
            @foreach ($products as $product )
            <tr>
                <td class="fw-bold">{{$product->cas}}</td>
                <td>{{$product->concentracio}}</td>
                <td>
                    {{$product->tipus_concentracio}}
                </td>
                <td>
                    {{$product->estat}}
                </td>
                
                <td>
                    {{$product->capacitat}}
                </td>
                <td>
                    {{$product->caducitat}}
                </td>
                <td>
                    {{$product->armari}}
                </td>
                <td>
                    <a href="" class="btn btn-warning">Editar</a>

                    <form action="{{route('products.destroy',$product)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
        {{$products->links()}}
    </div>
</div>
@endsection
