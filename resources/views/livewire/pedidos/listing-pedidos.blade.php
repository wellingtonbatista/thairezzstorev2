<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Filtros</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <button class="btn-warning" wire:click="LimparFiltroPedido">Limpar</button>
            </div>
        </div>

        <hr class="my-4">

        <div class="grid grid-cols-10 gap-4 mb-3">
            <div class="grid col-span-2">
                <label for="status_pedido" class="label-input-text">Status:</label>
                <select wire:model.live="status_pedido" name="status_pedido" class="input-text">
                    <option value="">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
            <div class="grid col-span-4">
                <label for="cliente_pedido" class="label-input-text">Cliente:</label>
                <select name="cliente_pedido" wire:model.live="cliente_pedido" class="input-text">
                    <option value="">Selecione uma Opção</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid col-span-4">
                <label for="natureza_operacao_pedido" class="label-input-text">Natureza de Operação:</label>
                <select name="natureza_operacao_pedido" wire:model.live="natureza_operacao_pedido" class="input-text">
                    <option value="">Selecione uma Opção</option>
                    @foreach ($natureza_operacao as $nat_operacao)
                        <option value="{{ $nat_operacao->id }}">{{ $nat_operacao->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Pedidos</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <a href="{{ route('pedidos.create') }}" class="btn-success" wire:navigate>Novo Pedido</a>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table">
                    <thead>
                        <tr>
                            <td class="text-sm font-bold text-black text-start">#</td>
                            <td class="text-sm font-bold text-black text-start">Cliente:</td>
                            <td class="text-sm font-bold text-black text-center">Data da Venda:</td>
                            <td class="text-sm font-bold text-black text-center">Natureza de Operação:</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <th class="py-4 text-start">{{ $pedido->id }}</th>
                                <th class="py-4 text-start">{{ $pedido->cliente->nome }}</th>
                                <td class="py-4 text-center">{{ date('d/m/Y', strtotime($pedido->data_venda)) }}</td>
                                <td class="py-4 text-center">{{ $pedido->natureza_operacao->nome }}</td>
                                <td class="py-4 text-end">
                                    <div class="dropdown dropdown-end">
                                        <div tabindex="0" role="button" class="btn-info m-1"><i class="bi bi-list"></i></div>
                                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                          <li>
                                            <a href="{{ route('pedidos.details', ['id_pedido' => $pedido->id]) }}" wire:navigate>Detalhes</a>
                                          </li>
                                          <li>
                                            @if ($pedido->estoque_lancado)
                                                <button wire:click="ExtornarEstoque({{$pedido->id}})">Extornar Estoque</button>
                                            @else
                                                <button wire:click="LancarEstoque({{$pedido->id}})">Lancar Estoque</button>
                                            @endif
                                          </li>
                                          <li>
                                            @if ($pedido->conta_lancada)
                                                <button wire:click="ExtornarConta({{$pedido->id}})">Extornar Contas</button>
                                            @else
                                                <button wire:click="LancarConta({{$pedido->id}})">Lancar Contas</button>
                                            @endif
                                          </li>
                                          <li>
                                            @if ($pedido->deleted_at == null)
                                                <button wire:click="ArquivarPedido({{$pedido->id}})">Arquivar</button>
                                            @else
                                                <button wire:click="DesarquivarPedido({{$pedido->id}})">Desarquivar</button>
                                            @endif
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