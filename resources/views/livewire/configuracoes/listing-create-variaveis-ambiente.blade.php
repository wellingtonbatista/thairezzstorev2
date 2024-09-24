<div>
    <div class="box text-end">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Variáveis de Ambiente</h1>
            </div>
            <div class="grid col-span-1 lg:justify-self-end">
                <a href="{{ route('config.listing') }}" wire:navigate class="btn-warning w-full lg:w-auto mt-7 lg:mt-0 text-center">Voltar</a>
            </div>
        </div>
    </div>
    <div class="box">
        <x-mary-tabs wire:model="selectedTab">
            <x-mary-tab name="utilities-tab" label="Utilitários Calculadora Shopee" icon="o-wrench-screwdriver">
                <div class="lg:mt-20 mt-5">

                    <div class="grid grid-cols-1 lg:grid-cols-2 h-40 content-start">
                        <div class="grid col-span-1 lg:me-44 pb-4 lg:pb-0">
                            <h1 class="titulo-2 pb-2">Comissão de Venda Shopee</h1>
                            <p class="text-xs lg:text-base">Preencha com a porcentagem de comissão padrão cobrado pela shopee para que seja calculado o valor correto na calculadora de comissão!!</p>
                        </div>
                        <div class="grid col-span-1">
                            <div>
                                <label for="taxa_comissao_shopee" class="label-input-text w-full">Taxa de Comissão Shopee:</label>
                                <input type="text" name="taxa_comissao_shopee" class="input-text w-full" wire:model="taxa_comissao_shopee">
                            </div>
                        </div>
                    </div>

                    <hr class="mt-16 mb-5">

                    <div class="grid grid-cols-1 lg:grid-cols-2 h-40 content-start">
                        <div class="grid col-span-1 lg:me-44 pb-4 lg:pb-0">
                            <h1 class="titulo-2 pb-2">Taxa de Transporte Shopee</h1>
                            <p class="text-xs lg:text-base">Preencha com a porcentagem de taxa relacionado a cobrança de transporte realizado pela shopee</p>
                        </div>
                        <div class="grid col-span-1">
                            <div>
                                <label for="taxa_transporte_shopee" class="label-input-text w-full">Taxa de Transporte Shopee:</label>
                                <input type="text" name="taxa_transporte_shopee" class="input-text w-full" wire:model="taxa_transporte_shopee">
                            </div>
                        </div>
                    </div>

                    <hr class="mt-16 mb-5">

                    <div class="grid grid-cols-1 lg:grid-cols-2 h-40 content-start">
                        <div class="grid col-span-1 lg:me-44 pb-4 lg:pb-0">
                            <h1 class="titulo-2 pb-2">Taxa de Transação Shopee</h1>
                            <p class="text-xs lg:text-base">Preencha com a porcentagem de taxa relacionado a cobrança de transações financeiras realizado pela shopee</p>
                        </div>
                        <div class="grid col-span-1">
                            <div>
                                <label for="taxa_transacao_shopee" class="label-input-text w-full">Taxa de Transação Shopee:</label>
                                <input type="text" name="taxa_transacao_shopee" class="input-text w-full" wire:model="taxa_transacao_shopee">
                            </div>
                        </div>
                    </div>

                    <hr class="mt-16 mb-5">

                    <div class="grid grid-cols-1 lg:grid-cols-2 h-40 content-start">
                        <div class="grid col-span-1 lg:me-44 pb-4 lg:pb-0">
                            <h1 class="titulo-2 pb-2">Taxa Fixa Por Item</h1>
                            <p class="text-xs lg:text-base">Preencha com a taxa relacionado a cobrança por item vendido realizado pela shopee</p>
                        </div>
                        <div class="grid col-span-1">
                            <div>
                                <label for="taxa_fixa_item_shopee" class="label-input-text w-full">Taxa Fixa por Item Shopee:</label>
                                <input type="text" name="taxa_fixa_item_shopee" class="input-text w-full" wire:model="taxa_fixa_item_shopee">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end mt-5">
                    <button wire:click='SalvarVariavelShopee' class="btn-success w-full lg:w-auto">Salvar</button>
                </div>
            </x-mary-tab>
        </x-mary-tabs>
    </div>
</div>
