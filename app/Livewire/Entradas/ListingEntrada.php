<?php

namespace App\Livewire\Entradas;

use App\Models\Entradas;
use Livewire\Component;

class ListingEntrada extends Component
{
    public $entradas = [];

    public function render()
    {
        $this->entradas = Entradas::all();

        return view('livewire.entradas.listing-entrada');
    }
}
