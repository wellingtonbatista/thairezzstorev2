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
                            <td class="text-sm font-bold text-black text-end">Detalhes</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entradas as $entrada)
                            <tr>
                                <th class="py-4">{{ $entrada->fornecedor->nome }}</th>
                                <td class="text-center py-4">{{ date('d/m/Y', strtotime($entrada->data_entrada)) }}</td>
                                <td class="text-center py-4">{{ $entrada->natureza_operacao->nome }}</td>
                                <td class="text-end py-4">
                                    <div class="dropdown">
                                        <div tabindex="0" role="button" class="btn-warning m-1"><i class="bi bi-view-list"></i></div>
                                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                          <li>
                                            <a href="{{ route('entrada.details', ['id_entrada' => $entrada->id]) }}" wire:navigate>Detalhes</a>
                                          </li>
                                          <li>
                                            @if ($entrada->estoque_lancado)
                                                <button wire:click="ExtornarEstoque({{$entrada->id}})">Extornar Estoque</button>
                                            @else
                                                <button wire:click="LancarEstoque({{$entrada->id}})">Lançar Estoque</button>
                                            @endif
                                          </li>
                                          <li>
                                            <button wire:click="ArquivarPedido({{$entrada->id}})">Arquivar</button>
                                          </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
