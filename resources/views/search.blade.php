@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                <th>CAS</th>
                <th>Nom</th>
                <th>FDS</th>
                <th>Concentració</th>
                <th>Tipus de Concentració</th>
                <th>Estat</th>
                <th>Capacitat</th>
                <th>Data de Caducitat</th>
                <th>Armari</th>
                <th>Quantitat</th>
                @auth
                <th>Accions</th>
                @endauth
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="fw-bold">{{ $product->cas }}</td>
                    <td>{{$product->nom}}</td>
                    <td>{{$product->fds}}</td>
                    <td>{{ $product->concentracio }}</td>
                    <td>{{ $product->tipus_concentracio }}</td>
                    <td>{{ $product->estat }}</td>
                    <td>{{ $product->capacitat }}</td>
                    <td>{{ $product->caducitat }}</td>
                    <td>{{ $product->armari }}</td>
                    <td>{{ $product->quantitat }}</td>
                    @auth
                    <td>
                    <a href="{{ route('consums.index', $product->id) }}" class="btn btn-warning">Retirar</a>

                        @if (auth()->user()->admin) {{-- Verifica si el usuario logeado es admin --}}
                    
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{route('products.destroy',$product)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @endif
                    @endauth
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection