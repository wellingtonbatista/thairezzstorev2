<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Pedidos</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <a href="{{ route('pedidos.create') }}" class="btn-success" wire:navigate>Novo Pedido</a>
            </div>
        </div>

        <hr class="divisor">

    </div>
</div>