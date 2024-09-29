<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024'
    ];

    public function render()
    {
        $salarios = Salario::all();   
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', [
            'salarios'=> $salarios,
            'categorias'=>$categorias
        ]);

    }
    
    public function crearVacante()
    {
        $datos = $this->validate();

        //almacenar imagen
        $imagen = $this->imagen->store('vacantes', 'public');
        $nombre_imagen = str_replace('vacantes/', '', $imagen);

        //crear Vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $nombre_imagen,
            'user_id' => auth()->id(),
        ]);

        //crear mensaje
        session()->flash('mensaje', 'La vacante ha sido publicada exitosamente!');
        //Redireccion
        return redirect()->route('vacantes.index');
    }
    
}
