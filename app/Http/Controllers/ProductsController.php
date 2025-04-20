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
        try {

            //mensagem de validação
            $messages = [
                'name.required' => 'O campo nome deve ser preenchido.',
                'stock.required' => 'O campo estoque deve ser preenchido.',
                'price.required' => 'O campo preço deve ser preenchido.',
                'description.required' => 'O campo descrição deve ser preenchido.',
            ];

            // Regras de validação
            $request->validate([
                'name' => 'required|string|max:255',
                'stock' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'description' => 'required|string',
            ], $messages);

            // dd($request->all());
            Products::create([
                'name' => $request->name,
                'stock' => $request->stock,
                'price' => $request->price,
                'description' => $request->description
            ]);

            session()->flash('success', 'Produto criado com sucesso');
            return redirect()->route('index');

        } catch (\Exception $e) {

            session()->flash('error', 'Ocorreu um erro ao tentar criar o produto');
            return redirect()->route('index');
        }
    }

    public function edit($id)
    {
        $produto = Products::findOrFail($id);
        return view('products.edit', ['produto' => $produto]);

    }

    public function update(Request $request, $id)
    {
        try{
            // Mensagens personalizadas
            $messages = [
            'name.required' => 'O campo nome deve ser preenchido.',
            'stock.required' => 'O campo estoque deve ser preenchido.',
            'price.required' => 'O campo preço deve ser preenchido.',
            'description.required' => 'O campo descrição deve ser preenchido.',
        ];

        // Regras de validação
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ], $messages);

        // Atualiza o produto
        $produto = Products::findOrFail($id); // melhor usar findOrFail
        $produto->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return redirect()->route('index')->with('success', 'Produto atualizado com sucesso!');

    }catch(\Exception $e){
        return redirect()->route('index')->with('error', 'Não foi possível atualizar o produto');
        
    }
    }

    public function destroy($id)
    {
        try{
            $produto = Products::findOrFail($id);
            $produto->delete();
            return redirect()->route('index')->with('success', 'produto excluido');
            
        }catch(\Exception $e){
            return redirect()->route('index')->with('error', 'Não foi possível excluir o produto');
            
        }
    }
}
