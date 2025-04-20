<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {   
        $produto = $request->get('query');
        // $produto = $request->p;
        $pequisadb = Products::where('name', 'LIKE', '%' .$produto . '%')->get();
        return response()->json($pequisadb);
    }
}
