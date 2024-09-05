<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Pedidos de Compras</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <a href="{{ route('entrada.create') }}" class="btn-success" wire:navigate>Nova Compra</a>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-sm font-bold text-black">Fornecedor:</th>
                            <td class="text-sm font-bold text-black text-center">Data de Compra:</td>
                            <td class="text-sm font-bold text-black text-center">Natureza de Operação</td>
                            <td class="text-sm font-bold text-black text-center">Valor Total</td>
                            <td class="text-sm font-bold text-black text-end">Detalhes</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entradas as $entrada)
                            <tr>
                                <th>{{ $entrada->fornecedor->nome }}</th>
                                <td class="text-center">{{ date('d/m/Y', strtotime($entrada->data_entrada)) }}</td>
                                <td class="text-center">{{ $entrada->natureza_operacao->nome }}</td>
                                <td></td>
                                <td class="text-end">
                                    <a href="{{ route('entrada.details', ['id_entrada' => $entrada->id]) }}" wire:navigate class="btn-success"><i class="bi bi-view-list"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
