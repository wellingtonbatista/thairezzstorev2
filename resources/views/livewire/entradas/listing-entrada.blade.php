<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Filtros</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <button class="btn-warning" wire:click="LimparFiltroEntradas">Limpar</button>
            </div>
        </div>

        <hr class="my-4">

        <div class="grid grid-cols-1 lg:grid-cols-10 gap-4 mb-3">
            <div class="grid col-span-1 lg:col-span-2">
                <label for="status_entrada" class="label-input-text">Status:</label>
                <select name="status_entrada" class="input-text" wire:model.live="status_entrada">
                    <option value="">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
            <div class="grid col-span-1 lg:col-span-4">
                <label for="fornecedor_entrada" class="label-input-text">Fornecedor:</label>
                <select name="fornecedor_entrada" class="input-text" wire:model.live="fornecedor_entrada">
                    <option>Selecione uma Opção</option>
                    @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid lg:col-span-4 col-span-1">
                <label for="natureza_operacao_entrada" class="label-input-text">Natureza de Operação:</label>
                <select name="natureza_operacao_entrada" class="input-text" wire:model.live="natureza_operacao_entrada">
                    <option>Selecione uma Opção</option>
                    @foreach ($natureza_operacao as $nat_operacao)
                        <option value="{{ $nat_operacao->id }}">{{ $nat_operacao->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

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
                                    <div class="dropdown dropdown-end">
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
                                            @if ($entrada->deleted_at == null)
                                                <button wire:click="ArquivarPedido({{$entrada->id}})">Arquivar</button>
                                            @else
                                                <button wire:click="DesarquivarPedido({{$entrada->id}})">Desarquivar</button>
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
