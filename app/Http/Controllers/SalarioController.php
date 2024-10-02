<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalarioController extends Controller
{
    public function index(){
        $salarios = Salario::all();
        return view('salarios.index', [
            'salarios' => $salarios,
        ]);
    }

    public function create(){
        return view('salarios.create');
    }

    public function store(Request $request){
        $request->validate([
            'salario' => ['required', 'string', 'max:255'],
        ]);

        Salario::create([
            'salario' => $request->salario,
        ]);

        session()->flash('mensaje', 'El salario se ha creado exitosamente!');
        
        return redirect()->route('salarios.index');
    }
}
