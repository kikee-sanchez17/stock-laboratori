<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ConsumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $product = Product::find($id);
        return view('consum', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

public function retirarProducto(Request $request, $id)
{
    // Lógica para retirar la cantidad del producto
    
    // Redireccionar a la página de inicio con un mensaje de éxito
    return Redirect::route('home')->with('success', 'Cantidad retirada correctamente.');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar el formulario
    $request->validate([
        'quantitat' => 'required|integer|min:1', // Asegura que la cantidad sea un número entero positivo
    ]);

    // Obtener el ID del producto y la cantidad a retirar del formulario
    $productId = $request->input('product_id');
    $quantitat = $request->input('quantitat');

    // Buscar el producto en la base de datos
    $product = Product::findOrFail($productId);

    // Validar que la cantidad a retirar no sea mayor que la cantidad actual del producto
    if ($quantitat > $product->quantitat) {
        return Redirect::back()->with('error', 'La cantidad a retirar es mayor que la cantidad actual del producto.');
    }

    // Actualizar la cantidad del producto en la base de datos
    $product->quantitat -= $quantitat;
    $product->save();

    // Redireccionar a la página de inicio con un mensaje de éxito
    return Redirect::route('home')->with('success', 'Cantidad retirada correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
