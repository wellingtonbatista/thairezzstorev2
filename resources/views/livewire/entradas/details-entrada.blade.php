<div>
    <div class="box pb-10">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Detalhes Pedido de Compra</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <a href="{{ route('entrada.listing') }}" wire:navigate class="btn-warning">Voltar</a>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <label for="natureza_operacao" class="label-input-text">Natureza de Operação</label>
                <input type="text" name="natureza_operacao" class="input-text bg-gray-200" value="{{ $entrada->natureza_operacao->nome }}" disabled>
            </div>
        </div>

        <br>

        <div class="grid grid-cols-3 gap-4">
            <div class="grid col-span-1">
                <label for="fornecedor_entrada" class="label-input-text">Fornecedor:</label>
                <input type="text" name="fornecedor_entrada" value="{{ $entrada->fornecedor->nome }}" class="input-text bg-gray-200" disabled>
            </div>

            <div class="grid col-span-1">
                <label for="data_compra_entrada" class="label-input-text">Data da Compra:</label>
                <input type="date" name="data_compra_entrada" value="{{ $entrada->data_entrada }}" disabled class="input-text bg-gray-200" wire:model='data_compra_entrada'>
            </div>

            <div class="grid col-span-1">
                <label for="valor_total_pedido" class="label-input-text">Valor Total:</label>
                <input type="text" name="valor_total_pedido" class="input-text bg-gray-200" disabled value="{{ $valor_total_pedido }}">
            </div>
        </div>
    </div>

    <div class="box">
        <div class="grid grid-cols-1">
            <div class="grid col-span-1 justify-self-end">
                <button class="btn-success" @click="$wire.myModal1 = true">Adicionar Produto ao Pedido</button>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table">
                    <thead>
                        <th class="text-sm font-bold text-black">Produto:</th>
                        <td class="text-sm font-bold text-black text-center">Quantidade:</td>
                        <td class="text-sm font-bold text-black text-center">Valor Unitario:</td>
                        <td class="text-sm font-bold text-black text-center">Valor Total</td>
                        <td class="text-sm font-bold text-black text-end">Remover</td>
                    </thead>
                    <tbody>
                        @foreach ($entrada->produtos as $entr)
                            <tr>
                                <th class="py-4">{{ $entr->nome }}</th>
                                <td class="py-4 text-center">{{ $entr->pivot->quantidade }}</td>
                                <td class="py-4 text-center">{{ Number::currency($entr->pivot->valor_compra, in:'BRL') }}</td>
                                <td class="py-4 text-center">{{ Number::currency(($entr->pivot->valor_compra * $entr->pivot->quantidade), in: "BRL") }}</td>
                                <td class="py-4 text-end">
                                    <button class="btn-danger" label="Open" @click="$wire.myModal2 = true, $wire.id_entrada_produto_remover = '{{ $entr->pivot->id }}'">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-mary-modal wire:model="myModal1">
        <div class="mb-5">
            <h3 class="text-lg font-bold">Adicionar Produto ao Pedido</h3>
            <hr class="divisor">

            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="id_deposito_entrada" class="label-input-text">Depositos:</label>
                    <select name="id_deposito_entrada" wire:model='id_deposito_entrada' class="input-text">
                        <option>Selecione uma Opção</option>
                        @foreach ($depositos as $deposito)
                            <option value="{{ $deposito->id }}">{{ $deposito->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="id_produto_entrada" class="label-input-text">Produto:</label>
                    <select name="id_produto_entrada" wire:model='id_produto_entrada' class="input-text">
                        <option>Selecione uma Opção</option>
                        @foreach ($produtos as $produto)
                            <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            <div class="grid grid-cols-2 gap-4 pb-8">
                <div class="grid col-span-1">
                    <label for="quantidade_entrada" class="label-input-text">Quantidade</label>
                    <input type="text" name="quantidade_entrada" class="input-text" wire:model='quantidade_entrada'>
                </div>
                <div class="grid col-span-1">
                    <div class="grid col-span-1">
                        <label for="valor_compra_entrada" class="label-input-text">Valor de Compra</label>
                        <input type="text" name="valor_compra_entrada" class="input-text" wire:model='valor_compra_entrada'>
                    </div>
                </div>
            </div>

            <hr class="divisor">

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="grid col-span-1">
                    <button wire:click='create_produto_entrada' class="btn-success w-full" type="submit">Adicionar</button>
                </div>
                <div class="grid col-span-1">
                    <button class="btn-danger w-full" @click="$wire.myModal1 = false">Fechar</button>
                </div>
            </div>
        </div>
    </x-mary-modal>

    <x-mary-modal wire:model="myModal2">
        <h3 class="text-lg font-bold">Remover Produto ao Pedido</h3>
        <hr class="divisor">
        <div class="mb-5">
            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="id_natureza_operacao_remover" class="label-input-text">Natureza Operacao</label>
                    <select wire:model='id_natureza_operacao_remover' name="id_natureza_operacao_remover" class="input-text">
                        <option>Selecione uma Opcao</option>
                        @foreach ($natureza_operacao as $nat_operacao)
                            <option value="{{ $nat_operacao->id }}">{{ $nat_operacao->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="id_depositos_remover" class="label-input-text">Deposito</label>
                    <select wire:model='id_depositos_remover' name="id_depositos_remover" class="input-text">
                        <option>Selecione uma Opcao</option>
                        @foreach ($depositos as $deposito)
                            <option value="{{ $deposito->id }}">{{ $deposito->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br>
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="grid col-span-1">
                <button class="btn-warning w-full" wire:click='remove_produto_entrada'>Remover Produto</button>
            </div>
            <div class="grid col-span-1">
                <button class="btn-danger w-full" @click="$wire.myModal2 = false">Fechar</button>
            </div>
        </div>
    </x-mary-modal>
</div>
