<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Detalhes Pedido de Venda</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <a href="{{ route('pedidos.listing') }}" class="btn-warning" wire:navigate>Voltar</a>
            </div>
        </div>
    </div>

    <div class="box">
        <x-mary-tabs wire:model="selectedTab">
            <x-mary-tab name="detalhes-tab" label="Detalhes" icon="o-clipboard-document-list">
                <div class="mt-10">
                    <div class="grid grid-cols-1">
                        <div class="grid col-span-1">
                            <label for="natureza_operacao_pedido" class="label-input-text">Natureza de Operacao:</label>
                            <input type="text" value="{{ $pedido->natureza_operacao->nome }}" name="natureza_operacao_pedido" disabled class="input-text bg-gray-200">
                        </div>
                    </div>
                    <br>
                    <div class="grid grid-cols-4 gap-4 mb-6">
                        <div class="grid col-span-1">
                            <label for="pedido_referencial" class="label-input-text">Pedido Referencial:</label>
                            <input type="text" name="pedido_referencial" disabled value="{{ $pedido->pedido_referencial }}" class="input-text bg-gray-200">
                        </div>
                        <div class="grid col-span-1">
                            <label for="cliente_pedido" class="label-input-text">Cliente:</label>
                            <input type="text" name="cliente_pedido" disabled value="{{ $pedido->cliente->nome }}" class="input-text bg-gray-200">
                        </div>
                        <div class="grid col-span-1">
                            <label for="data_vend_pedido" class="label-input-text">Data da Venda:</label>
                            <input type="text" name="data_venda_pedido" value="{{ date('d/m/Y', strtotime($pedido->data_venda)) }}" disabled class="input-text bg-gray-200">
                        </div>
                        <div class="grid col-span-1">
                            <label for="valor_total_pedido" class="label-input-text">Valor Total:</label>
                            <input type="text" name="valor_total_pedido" value="{{ Number::currency($valor_total_pedido, in:"BRL") }}" disabled class="input-text bg-gray-200">
                        </div>
                    </div>
                </div>
            </x-mary-tab>
            <x-mary-tab name="produto-tab" label="Produtos" icon="o-shopping-cart">
                <div class="mt-10">
                    <div class="text-end">
                        <button class="btn-success" @click="$wire.myModal1 = true">+</button>
                    </div>
            
                    <hr class="divisor">
            
                    <div class="grid grid-cols-1">
                        <div class="grid col-span-1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-sm font-bold text-black">Produto:</th>
                                        <th class="text-sm font-bold text-black text-center">Quantidade:</th>
                                        <th class="text-sm font-bold text-black text-center">Valor Unitario:</th>
                                        <th class="text-sm font-bold text-black text-center">Valot Total:</th>
                                        <th class="text-sm font-bold text-black text-end">Remover</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedido->produtos as $produto)
                                        <tr>
                                            <th class="py-4">{{ $produto->nome }}</th>
                                            <td class="py-4 text-center">{{ $produto->pivot->quantidade }}</td>
                                            <td class="py-4 text-center">{{ Number::currency($produto->pivot->valor_venda, in: 'BRL') }}</td>
                                            <td class="py-4 text-center">{{ Number::currency(($produto->pivot->valor_venda * $produto->pivot->quantidade), in: 'BRL') }}</td>
                                            <td class="py-4 text-end">
                                                <button wire:click="RemoverProdutoPedido({{$produto->pivot->id}})" class="btn-danger"><i class="bi bi-trash3"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </x-mary-tab>
            <x-mary-tab name="faturas-tab" label="Faturas" icon="o-credit-card">
                <div class="mt-10 text-end">
                    @if ($pedido->faturas->count() != 0)
                        <button class="btn-danger me-2" wire:click="RemoverParcelaFatura">-</button>
                    @else
                        <button class="btn-success" @click="$wire.myModal2 = true">+</button>
                    @endif
                </div>
                <hr class="divisor">
                <div class="grid grid-cols-1">
                    <div class="grid col-span-1">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-sm font-bold text-black">Data de Vencimento:</th>
                                    <td class="text-sm font-bold text-black text-center">Valor Parcela:</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedido->faturas as $fatura)
                                    <tr>
                                        <th>{{ date('d/m/Y', strtotime($fatura->data_vencimento)) }}</th>
                                        <td class="text-center">{{ Number::currency($fatura->valor_parcela, in: "BRL") }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </x-mary-tab>
        </x-mary-tabs>
    </div>

    <x-mary-modal wire:model="myModal1">
        <div class="mb-5">
            <h3 class="text-lg font-bold">Adicionar Produto ao Pedido</h3>
            <hr class="divisor">

            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="id_deposito_pedido" class="label-input-text">Depositos:</label>
                    <select name="id_deposito_pedido" wire:model='id_deposito_pedido' class="input-text">
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
                    <label for="id_produto_pedido" class="label-input-text">Produto:</label>
                    <select name="id_produto_pedido" wire:model='id_produto_pedido' class="input-text">
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
                    <label for="quantidade_pedido" class="label-input-text">Quantidade</label>
                    <input type="text" name="quantidade_pedido" class="input-text" wire:model='quantidade_pedido'>
                </div>
                <div class="grid col-span-1">
                    <div class="grid col-span-1">
                        <label for="valor_venda_pedido" class="label-input-text">Valor de Compra</label>
                        <input type="text" name="valor_venda_pedido" class="input-text" wire:model='valor_venda_pedido'>
                    </div>
                </div>
            </div>

            <hr class="divisor">

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="grid col-span-1">
                    <button wire:click='CreateProdutoPedido' class="btn-success w-full" type="submit">Adicionar</button>
                </div>
                <div class="grid col-span-1">
                    <button class="btn-danger w-full" @click="$wire.myModal1 = false">Fechar</button>
                </div>
            </div>
        </div>
    </x-mary-modal>

    <x-mary-modal wire:model="myModal2">
        <div class="mb-5">
            <h3 class="text-lg font-bold">Adicionar Parcela ao Pedido</h3>
            <hr class="divisor">

            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="quantidade_parcelas" class="label-input-text">Quantidade de Parcelas:</label>
                    <select name="quantidade_parcelas" wire:model="quantidade_parcelas" class="input-text">
                        <option>Selecione uma Opcao</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <div class="grid grid-cols-2 gap-4">
            <div class="grid col-span-1">
                <button class="btn-danger w-full" @click="$wire.myModal2 = false">Fechar</button>
            </div>
            <div class="grid col-span-1">
                <button class="btn-success w-full" wire:click="AdicionarParcelaFatura">Gerar Parcelas</button>
            </div>
        </div>
    </x-mary-modal>
</div>
