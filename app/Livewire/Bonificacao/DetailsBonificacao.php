<?php

namespace App\Livewire\Bonificacao;

use Livewire\Component;
use Mary\Traits\Toast;

class DetailsBonificacao extends Component
{
    use Toast;

    public $id_bonificacao;

    public function render()
    {
        return view('livewire.bonificacao.details-bonificacao');
    }
}
