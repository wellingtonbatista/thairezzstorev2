<div>
    <div class="box text-end">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Variáveis de Ambiente</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <a href="{{ route('config.listing') }}" wire:navigate class="btn-warning">Voltar</a>
            </div>
        </div>
    </div>
    <div class="box">
        <x-mary-tabs wire:model="selectedTab">
            <x-mary-tab name="utilities-tab" label="Utilitários Calculadora Shopee" icon="o-wrench-screwdriver">
                <div class="mt-6">
                    <div class="grid grid-cols-2 py-10">
                        <div class="grid col-span-1 me-20">
                            <h1 class="titulo-2">Comissão Shopee</h1>
                            <p class="">Preencha com a porcentagem de comissão padrão cobrado pela shopee para que seja calculado o valor correto na calculadora de comissão!!</p>
                        </div>
                        <div class="grid col-span-1">
                            <div>
                                <label for="taxa_comissao_shopee" class="label-input-text w-full">Taxa de Comissão Shopee:</label>
                                <input type="text" name="taxa_comissao_shopee" class="input-text w-full" wire:model="taxa_comissao_shopee">
                            </div>
                        </div>
                    </div>
                    <hr class="divisor">
                    <div class="grid grid-cols-2 py-10">
                        <div class="grid col-span-1 me-20">
                            <h1 class="titulo-2">Taxa de Transporte Shopee</h1>
                            <p class="">Preencha com a porcentagem de taxa relacionado a transporte shopee</p>
                        </div>
                        <div class="grid col-span-1">
                            <div>
                                <label for="taxa_transporte_shopee" class="label-input-text w-full">Taxa de Comissão Shopee:</label>
                                <input type="text" name="taxa_transporte_shopee" class="input-text w-full" wire:model="taxa_transporte_shopee">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end mt-5">
                    <button wire:click='SalvarVariavel' class="btn-success">Salvar</button>
                </div>
            </x-mary-tab>
        </x-mary-tabs>
    </div>
</div>
