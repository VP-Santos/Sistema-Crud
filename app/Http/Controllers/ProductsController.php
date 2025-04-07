<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() 
    {
        $produtos = Products::all();
        
        return view('index', ['produtos' => $produtos]);
    }

    public function create() 
    {
        // Products::created([
        // ]);
        return view('products.create');
    }
    
    public function store(Request $request)
    {   
        // dd($request->all());
        Products::create([
            'name' => $request->name,
            'stock' =>$request->stock,
            'price' => $request->price,
            'description' => $request->description
        ]);
        
        return redirect()->route('index');
    }
    public function edit($id)
    {
        // $pesquisa = "SELECT name, stock, price FROM products WHERE id = $id";
        // $produto = collect(Products::select($pesquisa))->first();

        $produto = Products::findOrFail($id);
        return view('products.edit', ['produto' => $produto]);
    }

    public function update(Request $request, $id)
    {
        $produto = Products::find($id);

        $produto->update([
            'name' => $request->name,
            'stock' =>$request->stock,
            'price' => $request->price,
            'discription' => $request->description
        ]);

        return redirect()->route('index');
    }

    public function destroy($id)
    {   
        $produto = Products::findOrFail($id);
        $produto->delete();
        return redirect()->route('index')->with('success', 'produto excluido');
    }
}
