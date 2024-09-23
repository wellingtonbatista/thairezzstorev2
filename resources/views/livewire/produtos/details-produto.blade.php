<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Detalhes Produto</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <button class="btn-warning">
                    <a href="{{ route('produtos.listing') }}" wire:navigate>Voltar</a>
                </button>
            </div>
        </div>

        <hr class="divisor">

        <x-mary-tabs wire:model="selectedTab">
            <x-mary-tab name="detalhes-tab" label="Detalhes Produto" icon="o-shopping-cart">
                <div class="mt-10">
                    <div class="grid grid-cols-11 gap-4">

                        <div class="grid col-span-2">
            
                            <label for="codigo_interno_produto-produto" class="label-input-text">
                                Cod. Interno:
                                @error('codigo_interno_produto')
                                    <span class="text-red-500">Campo Obrigatorio!</span>
                                @enderror
                            </label>
            
                            <input type="text" name="codigo_interno_produto" class="input-text" wire:model="codigo_interno_produto">
                        </div>
            
                        <div class="grid col-span-5">
            
                            <label for="nome_produto" class="label-input-text">
                                Nome:
                                @error('nome_produto')
                                    <span class="text-red-500">Campo obrigatorio!</span>
                                @enderror
                            </label>
            
                            <input type="text" name="nome_produto" class="input-text" wire:model="nome_produto">
                        </div>
            
                        <div class="grid col-span-2">
            
                            <label for="fornecedor_produto" class="label-input-text">
                                Fornecedor:
                                @error('id_fornecedor_produto')
                                    <span class="text-red-500">Campo obrigatorio!</span>
                                @enderror
                            </label>
            
                            <select class="input-text" name="fornecedor_produto" wire:model="id_fornecedor_produto">
                                <option>Selecione uma opcao</option>
            
                                @foreach ($fornecedores as $fornecedor)
                                    <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="grid col-span-2">
                            <label for="ean-produto" class="label-input-text">EAN:</label>
                            <input type="text" name="ean_produto" class="input-text" wire:model="ean_produto">
                        </div>
                    </div>

                    <br class="my-5">

                    <div class="grid grid-cols-1">
                        <div class="grid col-span-1">
                            <label for="descricao_produto" class="label-input-text">Descricao</label>
                            <textarea name="descricao_produto" cols="30" rows="10" class="input-text" wire:model="descricao_produto"></textarea>
                        </div>
                    </div>

                    <br class="my-5">

                    <div class="grid grid-cols-10 gap-4">
                        <div class="grid col-span-3">

                            <label for="valor_compra_produto" class="label-input-text">
                                Valor Compra:
                                @error('valor_compra_produto')
                                    <span class="text-red-500">Campo obrigatorio!</span>
                                @enderror
                            </label>
            
                            <input type="text" name="valor_compra_produto" class="input-text" wire:model="valor_compra_produto">
                        </div>
            
                        <div class="grid col-span-3">
            
                            <label for="valor_venda_produto" class="label-input-text">
                                Valor Venda:
                                @error('valor_venda_produto')
                                    <span class="text-red-500">Campo obrigatorio!</span>
                                @enderror
                            </label>
            
                            <input type="text" name="valor_venda_produto" class="input-text" wire:model="valor_venda_produto">
                        </div>
            
                        <div class="grid col-span-2">
                            <label for="estoque_produto" class="label-input-text">Estoque:</label>
                            <input type="text" name="estoque_produto" class="input-text bg-gray-200" value="0" wire:model='estoque_produto' disabled>
                        </div>
            
                        <div class="grid col-span-2">
                            <label for="estoque_produto" class="label-input-text">Estoque Bonificações:</label>
                            <input type="text" name="estoque_produto" class="input-text bg-gray-200" value="0" wire:model='estoque_produto_bonificacao' disabled>
                        </div>
                    </div>

                    <br class="my-5">

                    <div class="grid grid-cols-1">
                        <div class="grid col-span-1">
                            <label for="imagem_produto" class="label-input-text">Imagem:
                                @error('imagem_produto')
                                    <span class="text-red-500">Campo obrigatorio!</span>
                                @enderror
                            </label>
                            <x-mary-file wire:model="imagem_produto" hint=".jpeg .png" accept="image/png, image/jpeg" />
                        </div>
                    </div>

                    <br class="my-5">

                    <div class="text-end">
                        <button class="btn-success" type="button" wire:click="update_produto">Atuaizar</button>
                    </div>
                </div>
            </x-mary-tab>
            <x-mary-tab name="pedidos-tab" label="Pedidos" icon="o-shopping-bag">
                <div class="mt-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-sm text-black font-bold">Cliente:</th>
                                <td class="text-sm text-black font-bold">Data da Venda:</td>
                                <td class="text-sm text-black font-bold">Natureza de Operacao</td>
                                <td class="text-sm text-black font-bold">Pedido Referencial</td>
                                <td class="text-sm text-black font-bold"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-mary-tab>
        </x-mary-tabs>
    </div>
</div>
