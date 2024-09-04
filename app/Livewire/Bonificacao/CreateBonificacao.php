<?php

namespace App\Livewire\Bonificacao;

use Livewire\Component;
use Mary\Traits\Toast;

class CreateBonificacao extends Component
{
    use Toast;

    public function render()
    {
        return view('livewire.bonificacao.create-bonificacao');
    }
}
