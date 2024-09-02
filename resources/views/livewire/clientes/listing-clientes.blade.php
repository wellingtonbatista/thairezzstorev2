<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Clientes</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <button class="btn-success">
                    <a href="{{ route('cliente.create') }}" wire:navigate>Novo Cliente</a>
                </button>
            </div>
        </div>

        <hr class="divisor">
    </div>
</div>