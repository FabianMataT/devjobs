<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarAlerta extends Component
{
    public $message;
    
    public function render()
    {
        return view('livewire.mostrar-alerta');
    }
}
