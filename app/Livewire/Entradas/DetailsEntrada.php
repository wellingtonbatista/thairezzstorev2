<?php

namespace App\Livewire\Entradas;

use Livewire\Component;
use Mary\Traits\Toast;

class DetailsEntrada extends Component
{
    use Toast;

    public $id_entrada;
    
    public function render()
    {
        return view('livewire.entradas.details-entrada');
    }
}
