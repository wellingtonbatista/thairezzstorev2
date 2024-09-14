<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Detalhes Pedido de Venda</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <a href="{{ route('pedidos.listing') }}" class="btn-warning" wire:navigate>Voltar</a>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <label for="natureza_operacao_pedido" class="label-input-text">Natureza de Operacao:</label>
                <input type="text" value="{{ $pedido->natureza_operacao->nome }}" name="natureza_operacao_pedido" disabled class="input-text bg-gray-200">
            </div>
        </div>

        <br>

        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="grid col-span-1">
                <label for="cliente_pedido" class="label-input-text">Cliente:</label>
                <input type="text" name="cliente_pedido" disabled value="{{ $pedido->cliente->nome }}" class="input-text bg-gray-200">
            </div>
            <div class="grid col-span-1">
                <label for="data_vend_pedido" class="label-input-text">Data da Venda:</label>
                <input type="text" name="data_venda_pedido" value="{{ date('d/m/Y', strtotime($pedido->data_venda)) }}" disabled class="input-text bg-gray-200">
            </div>
            <div class="grid col-span-1">
                <label for="valor_total_pedido" class="label-input-text">Valor Total:</label>
                <input type="text" name="valor_total_pedido" value="{{ Number::currency($valor_total_pedido, in:"BRL") }}" disabled class="input-text bg-gray-200">
            </div>
        </div>
    </div>
</div>
