<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        //
        $products = Product::latest()->paginate(5);
        return view('home',['products' => $products]);
    }
    public function search(){
        $search_text = $_GET['query'];
        $products=Product::where(function($query) use ($search_text){
            $query->where('nom','like',"%$search_text%")
            ->orWhere('fds','like',"%$search_text%");
        })
        ->get();
        return view('search',compact('products'));
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
            'nom' => 'required',
            'fds' => 'required',
            'concentracio' => 'required',
            'estat' => 'required',
            'tipus_concentracio' => 'required',
            'capacitat' => 'required',
            'caducitat' => 'required',
            'armari' => 'required',
            'quantitat' => 'required',
        ]);
        
        Product::create($request->all());
        return redirect()->route('home')->with('success','Nueva tarea creada exitosamente!!');
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
            'nom' => 'required',
            'fds' => 'required',
            'concentracio' => 'required',
            'estat' => 'required',
            'tipus_concentracio' => 'required',
            'capacitat' => 'required',
            'caducitat' => 'required',
            'armari' => 'required',
            'quantitat' => 'required',
        ]);
        $product->update($request->all());
        return redirect()->route('home')->with('success','Tarea actualizada exitosamente!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('home')->with('success','Tarea eliminada exitosamente!!');
    }
}