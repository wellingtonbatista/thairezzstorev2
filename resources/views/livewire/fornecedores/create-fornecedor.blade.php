<div>
    <form wire:submit="create_fornecedor">
        <div class="box">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="grid col-span-1 justify-self-start">
                    <h1 class="titulo">Novo Fornecedor</h1>
                </div>
                <div class="grid col-span-1 lg:justify-self-end mt-7 lg:mt-0">
                    <button class="btn-warning w-full lg:w-auto">
                        <a href="{{ route('fornecedor.listing') }}" wire:navigate>Voltar</a>
                    </button>
                </div>
            </div>

            <hr class="divisor">

            <div class="grid grid-cols-1 lg:grid-cols-6 gap-4">

                <div class="grid lg:col-span-4 col-span-1">
                    <label for="nome_fornecedor" class="label-input-text">
                        Nome do Fornecedor: <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="nome_fornecedor" class="input-text" wire:model="nome_fornecedor">
                </div>

                <div class="grid lg:col-span-2 col-span-1">
                    <label for="limite_compra" class="label-input-text">Limite de Compra (R$)</label>
                    <input type="text" name="limite_compra" class="input-text" wire:model="limite_compra_fornecedor">
                </div>

            </div>

            <br class="my-5">

            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="descricao_fornecedor" class="label-input-text">Descrição</label>
                    <textarea name="descricao_fornecedor" cols="30" rows="8" class="input-text" wire:model="descricao_fornecedor">

                    </textarea>
                </div>
            </div>

            <br class="mt-10">

            <div class="text-end">
                <button class="btn-success w-full w-auto" type="submit">Cadastrar</button>
            </div>
        </div>
    </form>
</div>
