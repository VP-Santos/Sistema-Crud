<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class MyController extends Controller
{
    public function produtos(){
        echo "<h1>Produtos</h1>";
        echo "<ol>";
        echo "<li>Notebook</li>";
        echo "<li>Teclado</li>";
        echo "<li>Mouse</li>";
        echo "</ol>";
    }

    public function getNome() {
        return 'Jose da silva';
    }
    
    public function getIdade(){
        return "30 anos";
    }

    public function multiplicar($n1, $n2){
        return $n1 * $n2;
    }
}
