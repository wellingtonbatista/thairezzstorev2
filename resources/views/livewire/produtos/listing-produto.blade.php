<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Filtros</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <button wire:click="LimparFiltroProduto" class="btn-warning">Limpar</button>
            </div>
        </div>

        <hr class="my-4">

        <div class="grid grid-cols-4 mb-3 gap-4">
            <div class="grid col-span-1">
                <label for="status_produto" class="label-input-text">Status:</label>
                <select name="status_produto" wire:model.live="status_produto" class="input-text">
                    <option value="">Ativos</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>

            <div class="grid col-span-2">
                <label for="nome_produto" class="label-input-text">Nome:</label>
                <input type="text" name="nome_produto" wire:model.live="nome_produto" class="input-text">
            </div>

            <div class="grid col-span-1">
                <label for="codigo_interno_produto" class="label-input-text">Codigo Interno:</label>
                <input type="text" name="codigo_interno_produto" wire:model.live="codigo_interno_produto" class="input-text">
            </div>
        </div>
    </div>
   <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Produtos</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <button class="btn-success">
                    <a href="{{ route('produtos.create') }}" wire:navigate>Novo Produto</a>
                </button>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table">
                    <thead>
                        <tr>
                            <td></td>
                            <th class="text-sm font-bold text-black text-start">Cod. Interno</th>
                            <td class="text-sm font-bold text-black text-start">Nome</td>
                            <td class="text-sm font-bold text-black text-end">Fornecedor</td>
                            <td class="text-sm font-bold text-black text-center">Valor</td>
                            <td class="text-sm font-bold text-black text-center">Estoque</td>
                            <td class="text-sm font-bold text-black text-center">Bonificação</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>
                                    <div class="avatar bg-transparent">
                                        <div class="mask mask-squircle w-12">
                                            <img src="{{ asset('photos/'.$produto->img) }}" />
                                        </div>
                                    </div>
                                </td>
                                <th class="py-4 text-start">{{ $produto->codigo_interno }}</th>
                                <td class="py-4 text-start">{{ $produto->nome }}</td>
                                <td class="py-4 text-end">{{ $produto->fornecedor->nome }}</td>
                                <td class="py-4 text-center">{{ Number::currency($produto->valor_venda, in: 'BRL') }}</td>
                                <td class="py-4 text-center">{{ $produto->estoque }}</td>
                                <td class="py-4 text-center">{{ $produto->estoque_bonificacao }}</td>
                                <td class="text-end">
                                    <div class="dropdown dropdown-end">
                                        <div tabindex="0" role="button" class="btn-warning m-1"><i class="bi bi-list"></i></div>
                                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                          <li>
                                            <a href="{{ route('produtos.details', ['id_produto' => $produto->id]) }}" wirew:navigate>Detalhes</a>
                                          </li>
                                          <li>
                                            @if ($produto->deleted_at == null)
                                                <button wire:click="ArquivarProduto({{$produto->id}})">Arquivar</button>
                                            @else
                                            <button wire:click="DesarquivarProduto({{$produto->id}})">Desarquivar</button>
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
