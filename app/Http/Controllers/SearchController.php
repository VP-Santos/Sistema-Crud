<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {   
        
        $pequisadb = Products::where('name', 'LIKE', '%' . $request->q . '%')->get();
        return response()->json($pequisadb);
    }
}
