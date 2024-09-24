<div>
    <form wire:submit="create_cliente">
        <div class="box">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="grid col-span-1 justify-self-start">
                    <h1 class="titulo">Novo Cliente</h1>
                </div>
                <div class="grid col-span-1 lg:justify-self-end">
                    <button class="btn-warning w-full lg:w-auto mt-7 lg:mt-0">
                        <a href="{{ route('cliente.listing') }}" wire:navigate>Voltar</a>
                    </button>
                </div>
            </div>

            <hr class="divisor">

            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="nome_cliente" class="label-input-text">
                        Nome:
                        @error('nome_cliente')
                            <span class="text-red-600">Campo Obrigatorio!</span>
                        @enderror
                    </label>
                    <input type="text" name="nome_cliente" class="input-text" wire:model="nome_cliente">
                </div>
            </div>

            <br class="my-5">

            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                <div class="grid col-span-1">
                    <label for="documento_cliente" class="label-input-text">Documento:</label>
                    <input type="text" name="documento_cliente" class="input-text" wire:model="documento_cliente">
                </div>
                <div class="grid col-span-1">
                    <label for="contato_cliente" class="label-input-text">Contato:</label>
                    <input type="text" name="contato_cliente" class="input-text" wire:model="contato_cliente">
                </div>
                <div class="grid col-span-1">
                    <label for="documento_cliente" class="label-input-text">Data Nascimento:</label>
                    <input type="date" name="documento_cliente" class="input-text" wire:model="data_nascimento_cliente">
                </div>
            </div>

            <br class="my-5">

            <div class="text-end">
                <button class="btn-success w-full lg:w-auto" type="submit">Cadastrar</button>
            </div>
        </div>
    </form>
</div>