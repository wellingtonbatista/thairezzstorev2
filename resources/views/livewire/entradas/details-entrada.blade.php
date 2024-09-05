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

        <div class="grid grid-cols-5 gap-4">
            <div class="grid col-span-3">
                <label for="id_natureza_operacao" class="label-input-text">Natureza de Operação</label>
                <select name="id_natureza_operacao" wire:model='id_natureza_operacao' class="input-text bg-gray-200" disabled>
                    <option>Selecione uma Opção</option>
                    @foreach ($natureza_operacao as $nat_operacao)
                        <option value="{{ $nat_operacao->id }}">{{ $nat_operacao->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid col-span-1">
                <label for="id_fornecedor_entrada" class="label-input-text">Fornecedor:</label>
                <select name="id_fornecedor_entrada" class="input-text" wire:model='id_fornecedor_entrada'>
                    <option>Selecione uma opção</option>
                    @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid col-span-1">
                <label for="data_compra_entrada" class="label-input-text">Data da Compra:</label>
                <input type="date" name="data_compra_entrada" class="input-text" wire:model='data_compra_entrada'>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="grid grid-cols-1">
            <div class="grid col-span-1 justify-self-end">
                <button class="btn-success" onclick="my_modal_4.showModal()">Adicionar Produto ao Pedido</button>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table">
                    <thead>
                        <th class="text-sm font-bold text-black">Produto:</th>
                        <td class="text-sm font-bold text-black text-center">Quantidade:</td>
                        <td class="text-sm font-bold text-black text-center">Valor de Compra</td>
                        <td class="text-sm font-bold text-black text-center">Valor Total</td>
                        <td class="text-sm font-bold text-black text-end">Remover</td>
                    </thead>
                    <tbody>
                        @foreach ($produtos_pedido as $produto_pedido)
                            <tr>
                                <th></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <dialog id="my_modal_4" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold">Adicionar Produto ao Pedido</h3>
            <hr class="divisor">

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

            <div class="grid grid-cols-2 gap-4">
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

            <br>
            <div class="flex justify-end">
                <div>
                    <button wire:click='create_produto_entrada' class="btn-success me-4" type="submit">Adicionar</button>
                </div>
                <div>
                    <form>
                        <button class="btn-danger">Fechar</button>
                    </form>
                </div>
            </div>
        </div>
    </dialog>
</div>
