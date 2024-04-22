<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::latest()->paginate(3);
        return view('index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cas' => 'required',
            'concentracio' => 'required',
            'estat' => 'required',
            'tipus_concentracio' => 'required',
            'capacitat' => 'required',
            'caducitat' => 'required',
            'armari' => 'required',
        ]);
        
        Product::create($request->all());
        return redirect()->route('products.index')->with('success','Nueva tarea creada exitosamente!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('edit',['product'=>$product]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'cas' => 'required',
            'concentracio' => 'required',
            'estat' => 'required',
            'tipus_concentracio' => 'required',
            'capacitat' => 'required',
            'caducitat' => 'required',
            'armari' => 'required',
        ]);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success','Tarea actualizada exitosamente!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index')->with('success','Tarea eliminada exitosamente!!');
    }
}
