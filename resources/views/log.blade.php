@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>Nombre de Usuario</th>
                <th>Fecha de Consumo</th>
                <th>CAS del Producto</th>
                <th>Concentración</th>
                <th>Motivo</th>
                <th>Cantidad de Consumo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consums as $consum)
            <tr>
            <td>{{ $consum->user->name }}</td> <!-- Accediendo al nombre del usuario -->
                 <!-- Suponiendo que tienes una relación user en el modelo Consum -->
                <td>{{ $consum->data }}</td>
                <td>{{ $consum->cas }}</td>
                <td>{{ $consum->concentracio }}</td>
                <td>{{ $consum->motiu }}</td>
                <td>{{ $consum->consum }} {{ $consum->product->estat === 'Líquid' ? 'ml' : 'g' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
