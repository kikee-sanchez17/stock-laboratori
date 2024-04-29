<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Consum;
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
public function log(){
     // Obtener todos los registros de consumos con los nombres de los usuarios relacionados
    $consums = Consum::with('user', 'product')->get();

    // Pasar los consumos a la vista 'log'
    return view('log', ['consums' => $consums]);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar el formulario
    $request->validate([
        'quantitat' => 'required|numeric|min:0.1', // Asegura que la cantidad sea un número entero positivo
        'product_id' => 'required|exists:products,id', // Asegura que el ID del producto exista en la tabla de productos

    ]);

    // Obtener el ID del producto y la cantidad a retirar del formulario
    $productId = $request->input('product_id');
    $quantitat = $request->input('quantitat');
    $product = Product::findOrFail($productId);

    $userId = auth()->id();

    $consum_alum = new Consum();
    $consum_alum->usuari_id = $userId;
    $consum_alum->data = now(); // Fecha y hora actual
    $consum_alum->cas = $product->cas; // Obtener el CAS del producto
    $consum_alum->concentracio = $product->concentracio; // Obtener la concentración del producto
    $consum_alum->motiu = $request->input('motiu'); // Motivo de consumo (puedes ajustarlo según tu lógica)
    $consum_alum->consum = $quantitat; // Cantidad a consumir
    $consum_alum->product_id = $productId; // ID del producto consumido
    $consum_alum->save();
    // Buscar el producto en la base de datos
   

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
