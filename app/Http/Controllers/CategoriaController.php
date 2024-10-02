<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function index(){
        $categorias = Categoria::all();
        return view('categorias.index', [
            'categorias' => $categorias,
        ]);
    }

    public function create(){
        return view('categorias.create');
    }

    public function store(Request $request){
        $request->validate([
            'categoria' => ['required', 'string', 'max:255'],
        ]);

        Categoria::create([
            'categoria' => $request->categoria,
        ]);

        session()->flash('mensaje', 'La categoria se ha creado exitosamente!');
        
        return redirect()->route('categorias.index');
    }
}
