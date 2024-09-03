<div>
    <form wire:submit="create_estoque">
        <div class="box">
            <div class="grid grid-cols-2">
                <div class="grid col-span-1 justify-self-start">
                    <h1 class="titulo">Nova Movimentação de Estoque</h1>
                </div>
                <div class="grid col-span-1 justify-self-end">
                    <button class="btn-warning">
                        <a href="{{ route('estoque.listing') }}" wire:navigate>Voltar</a>
                    </button>
                </div>
            </div>
    
            <hr class="divisor">
    
            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="nome_produto" class="label-input-text">
                        Produto:
                        @error('id_produto')
                            <span class="text-red-500">Campo Obrigatorio!</span>
                        @enderror
                    </label>
                    <select name="nome_produto" class="input-text" wire:model="id_produto">
                        <option>Selecione um Produto</option>
                        @foreach ($produtos as $produto)
                            <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <br class="my-5">
    
            <div class="grid grid-cols-3 gap-4">
                <div class="grid col-span-1">
                    <label for="tipo_estoque" class="label-input-text">
                        Tipo:
                        @error('tipo_estoque')
                            <span class="text-red-500">Campo Obrigatorio!</span>
                        @enderror
                    </label>
                    <select name="tipo_estoque" class="input-text" wire:model="tipo_estoque">
                        <option>Selecione um Tipo</option>
                        <option value="entrada">Entrada</option>
                        <option value="saida">Saida</option>
                    </select>
                </div>
                <div class="grid col-span-1">
                    <label for="deposito_estoque" class="label-input-text">
                        Deposito:
                        @error('id_deposito_estoque')
                            <span class="text-red-500">Campo Obrigatorio!</span>
                        @enderror
                    </label>
                    <select name="deposito_estoque" class="input-text" wire:model="id_deposito_estoque">
                        <option>Selecione um Deposito</option>
                        @foreach ($depositos as $deposito)
                            <option value="{{ $deposito->id }}">{{ $deposito->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid col-span-1">
                    <label for="quantidade_estoque" class="label-input-text">
                        Quantidade:
                        @error('quantidade_estoque')
                            <span class="text-red-500">Campo Obrigatorio!</span>
                        @enderror
                    </label>
                    <input type="number" name="quantidade_estoque" class="input-text" wire:model="quantidade_estoque">
                </div>
            </div>
    
            <br class="my-5">
    
            <div class="text-end">
                <button class="btn-success" type="submit">Cadastrar</button>
            </div>
        </div>
    </form>
</div>
