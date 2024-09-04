<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class Dashboard extends Component
{
    public $produtos_cadastrados;
    public $valor_total_estoque = 0;
    public $valot_total_investido = 0;
    public $lucro_total_estoque = 0;

    public function render()
    {
        return view('dashboard');
    }

    public function mount()
    {
        $produtos = Produto::all();

        //QUANTIDADE TOTAL DE PRODUTOS CADASTRADOS
        $this->produtos_cadastrados = $produtos->count();

        
    }
}
