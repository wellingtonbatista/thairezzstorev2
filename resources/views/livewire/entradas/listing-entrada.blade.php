<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Pedidos de Compras</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <a href="{{ route('entrada.create') }}" class="btn-success" wire:navigate>Nova Compra</a>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table">

                </table>
            </div>
        </div>
    </div>
</div>
