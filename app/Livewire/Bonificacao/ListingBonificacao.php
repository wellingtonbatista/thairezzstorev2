<?php

namespace App\Livewire\Bonificacao;

use Livewire\Component;
use Mary\Traits\Toast;

class ListingBonificacao extends Component
{
    use Toast;

    public function render()
    {
        return view('livewire.bonificacao.listing-bonificacao');
    }
}
