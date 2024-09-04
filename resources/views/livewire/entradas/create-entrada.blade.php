<div>
    <form wire:submit="create_entrada">
        <div class="box">
            <div class="grid grid-cols-2">
                <div class="grid col-span-1">
                    <h1 class="titulo">Adicionar Pedido de Compra</h1>
                </div>
                <div class="grid col-span-1 justify-self-end">
                    <a href="{{ route('entrada.listing') }}" class="btn-warning" wire:navigate>Voltar</a>
                </div>
            </div>

            <hr class="divisor">

            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="id_natureza_operacao_entrada" class="label-input-text">
                        Natureza de Operação:
                        @error('id_natureza_operacao_entrada')
                            <span class="text-red-600">Campo Obrigatorio!</span>
                        @enderror
                    </label>
                    <select name="id_natureza_operacao_entrada" class="input-text" wire:model="id_natureza_operacao_entrada">
                        <option>Selecione uma Opção</option>
                        @foreach ($natureza_operacao as $nat_operacao)
                            <option value="{{ $nat_operacao->id }}">{{ $nat_operacao->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            <div class="grid grid-cols-2 gap-4">
                <div class="grid col-span-1">
                    <label for="data_compra_entrada" class="label-input-text">
                        Data da Compra:
                        @error('data_compra_entrada')
                            <span class="text-red-600">Campo Obrigatorio!</span>
                        @enderror
                    </label>
                    <input type="date" name="data_compra_entrada" class="input-text" wire:model="data_compra_entrada">
                </div>
                <div class="grid col-span-1">
                    <label for="id_fornecedor_entrada" class="label-input-text">
                        Fornecedor:
                        @error('id_fornecedor_entrada')
                            <span class="text-red-600">Campo Obrigatorio!</span>
                        @enderror
                    </label>
                    <select name="id_fornecedor_entrada" class="input-text" wire:model="id_fornecedor_entrada">
                        <option>Selecione uma Opção</option>
                        @foreach ($fornecedores as $fornecedor)
                            <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            <div class="text-end">
                <button type="submit" class="btn-success">Cadastrar</button>
            </div>
        </div>
    </form>
</div>
