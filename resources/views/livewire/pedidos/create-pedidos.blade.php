<div>
    <div class="box">
        <form wire:submit="AdicionarPedido">
            <div class="grid grid-cols-2">
                <div class="grid col-span-1 justify-self-start">
                    <h1 class="titulo">Novo Pedido</h1>
                </div>
                <div class="grid col-span-1 justify-self-end">
                    <a href="{{ route('pedidos.listing') }}" class="btn-warning" wire:navigate>Voltar</a>
                </div>
            </div>
    
            <hr class="divisor">
    
            <div class="grid grid-cols-1">
                <div class="grid col-span-1">
                    <label for="id_cliente_pedido" class="label-input-text">Cliente:</label>
                    <select name="id_cliente_pedido" wire:model="id_cliente_pedido" class="input-text">
                        <option>Selecione uma Opção</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <br>
    
            <div class="grid grid-cols-3 gap-4">
                <div class="grid col-span-1">
                    <label for="pedido_referencial" class="label-input-text">Pedido Referencial:</label>
                    <input type="text" name="pedido_referencial" wire:model="pedido_referencial" class="input-text">
                </div>
                <div class="grid col-span-1">
                    <label for="data_pedido" class="label-input-text">Data do Pedido:</label>
                    <input type="date" name="data_pedido" wire:model="data_pedido" class="input-text">
                </div>
                <div class="grid col-span-1">
                    <label for="id_natureza_operacao_pedido" class="label-input-text">Natureza de Operação:</label>
                    <select name="id_natureza_operacao_pedido" wire:model="id_natureza_operacao_pedido" class="input-text">
                        <option>Selecione uma Opção</option>
                        @foreach ($natureza_operacao as $nat_operacao)
                            <option value="{{ $nat_operacao->id }}">{{ $nat_operacao->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <br>
    
            <div class="text-end">
                <button class="btn-success" type="submit">Adicionar</button>
            </div>
        </form>
    </div>
</div>