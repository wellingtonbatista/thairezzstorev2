<?php

namespace App\Livewire\ContasReceber;

use App\Models\ContasReceber;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class ContasReceberListing extends Component
{
    use Toast;
    use WithPagination, WithoutUrlPagination;

    public function render()
    {
        return view('livewire.contas-receber.contas-receber-listing', [
            'contas_abertas' => ContasReceber::where('pagamento', false)->orderBy('data_vencimento', 'asc')->paginate(10)
        ]);
    }

    public function ContaPaga($id)
    {
        $conta = ContasReceber::find($id);

        $conta->pagamento = true;
        $conta->save();

        $this->toast(
            type: 'success',
            title: 'Conta Recebida com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function ExtornarContaPaga($id)
    {
        $conta = ContasReceber::find($id);

        $conta->pagamento = false;
        $conta->save();

        $this->toast(
            type: 'success',
            title: 'Conta Extornada com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function LimparFiltroContas()
    {
        $this->reset(
            'status_conta',
            'ordenar_por',
            'ordenar_desc'
        );
    }
}
