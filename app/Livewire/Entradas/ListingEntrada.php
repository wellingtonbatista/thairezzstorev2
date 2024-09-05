<?php

namespace App\Livewire\Entradas;

use App\Models\Entradas;
use Livewire\Component;

class ListingEntrada extends Component
{
    public $entradas = [];

    public function render()
    {
        $this->entradas = Entradas::OrderBy('data_entrada', 'desc')->get();

        return view('livewire.entradas.listing-entrada');
    }
}
