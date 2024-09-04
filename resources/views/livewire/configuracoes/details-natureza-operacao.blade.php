<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Detalhes Natureza de Operação</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <a href="{{ route('natureza_operacao.listing') }}" wire:navigate class="btn-warning">Voltar</a>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-5 gap-4">
            <div class="grid col-span-1">
                <label for="tipo_natureza_operacao" class="label-input-text">
                    Tipo:
                    @error('tipo_natureza_operacao')
                        <span class="text-red-500">Campo Obrigatorio</span>
                    @enderror
                </label>
                <select name="tipo_natureza_operacao" wire:model="tipo_natureza_operacao" class="input-text">
                    <option>Selecione Uma Opcao</option>
                    <option value="0">Entrada</option>
                    <option value="1">Saida</option>
                </select>
            </div>
            <div class="grid col-span-4">
                <label for="nome_natureza_operacao" class="label-input-text">
                    Nome:
                    @error('nome_natureza_operacao')
                        <span class="text-red-500">Campo Obrigatorio</span>
                    @enderror
                </label>
                <input type="text" name="nome_natureza_operacao" class="input-text" wire:model="nome_natureza_operacao">
            </div>
        </div>

        <br>

        <div class="grid grid-cols-6 gap-6 mt-3">
            <div class="grid col-span-1">
                <div class="form-control">
                    <label class="label cursor-pointer">
                      <span class="label-input-text">Bonificação?</span>
                      <input type="checkbox" class="checkbox" {{ $bonificacao ? 'checked' : '' }} wire:model="bonificacao" />
                    </label>
                </div>
            </div>
        </div>

        <br class="my-8">

        <div class="text-end">
            <button class="btn-success" wire:click="update_natureza_operacao">Atualizar</button>
        </div>
    </div>
</div>