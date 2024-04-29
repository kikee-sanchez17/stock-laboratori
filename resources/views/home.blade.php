@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <h2>Productes Laboratori</h2>
        </div>
        @auth
            @if (auth()->user()->admin) {{-- Verifica si el usuario logeado es admin --}}
            <div>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Afegir Producte</a>
            </div>
            @endif
        @endauth
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success mb-4">
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
   
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
    @if($product->quantitat > 0)
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
                </td>
            @endauth
        </tr>
    @endif
@endforeach

            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>

@endsection