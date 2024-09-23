<div>
    <div class="box">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Calculadora de Descontos Shopee</h1>
            </div>
            <div class="grid col-span-1 justify-self-end mt-3 lg:mt-0">
                <a href="{{ route('config.listing') }}" wire:navigate class="btn-warning">Voltar</a>
            </div>
        </div>

        <hr class="my-5">

        <div class="grid grid-cols-1 gap-4 mb-5 lg:grid-cols-2">

            <div class="grid col-span-1">
                <label for="valor_bruto" class="label-input-text">Valor de Venda Produto:</label>
                <input type="text" name="valor_bruto" wire:model.live="valor_bruto" class="input-text">
            </div>

            <div class="grid col-span-1">
                <label for="valor_custo" class="label-input-text">Custo de Compra do Produto:</label>
                <input type="text" name="valor_custo" wire:model.live="valor_custo" class="input-text">
            </div>

        </div>

        <div class="text-end mt-10">
            <button wire:click="CalcularValorLiquido" class="btn-success">Calcular</button>
        </div>
        
    </div>

    <div class="box">
        <table class="table">
            <tbody>
                <tr>
                    <th class="py-4 text-sm">Taxa de Comissao Shopee:</th>
                    <td class="py-4 text-sm text-end">{{ $valores_parciais == null ? 'n/a' : Number::currency($valores_parciais['comissao'], in: "BRL") }}</td>
                </tr>
                <tr>
                    <th class="py-4 text-sm">Taxa de Transporte Shopee:</th>
                    <td class="py-4 text-sm text-end">{{ $valores_parciais == null ? 'n/a' : Number::currency($valores_parciais['transporte'], in: "BRL") }}</td>
                </tr>
                <tr>
                    <th class="py-4 text-sm">Taxa de Transação Shopee:</th>
                    <td class="py-4 text-sm text-end">{{ $valores_parciais == null ? 'n/a' : Number::currency($valores_parciais['transacao'], in: "BRL") }}</td>
                </tr>
                <tr>
                    <th class="py-4 text-sm">Taxa por Item Shopee:</th>
                    <td class="py-4 text-sm text-end border-b border-black">{{ $valores_parciais == null ? 'n/a' : Number::currency($valores_parciais['taxa_item'], in: "BRL") }}</td>
                </tr>
                <tr>
                    <th class="py-5 text-sm text-end">Total Descontos:</th>
                    <td class="py-5 text-sm text-end">{{ $valores_parciais == null ? 'n/a' : Number::currency($valores_parciais['total_desconto'], in: "BRL") }}</td>
                </tr>
                <tr>
                    <th class="py-5 text-sm text-end">Lucro Liquido:</th>
                    <td class="py-5 text-sm text-end">{{ $valores_parciais == null ? 'n/a' : Number::currency($valores_parciais['lucro_liquido'], in: "BRL") }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
