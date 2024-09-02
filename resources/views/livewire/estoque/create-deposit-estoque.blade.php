<div>
    <form wire:submit="create_deposito">
        <div class="box">
            <div class="grid grid-cols-2">
                <div class="grid col-span-1 justify-self-start">
                    <h1 class="titulo">Nova Deposito</h1>
                </div>
                <div class="grid col-span-1 justify-self-end">
                    <button class="btn-warning">
                        <a href="{{ route('estoque.deposit.listing') }}" wire:navigate>Voltar</a>
                    </button>
                </div>
            </div>
    
            <hr class="divisor">
    
            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="nome_deposito" class="label-input-text">
                        Nome Deposito:
                        @error('nome_deposito')
                            <span class="text-red-500">Campo Obrigatorio</span>
                        @enderror
                    </label>
                    <input type="text" name="nome_deposito" class="input-text" wire:model="nome_deposito">
                </div>
            </div>
    
            <br class="my-5">
    
            <div class="text-end">
                <button class="btn-success" type="submit">Cadastrar</button>
            </div>
        </div>
    </form>
</div>
