<div>
    <div class="box">
        <div class="grid grid-cols-4 gap-7">
            <div class="grid col-span-1">
                <a class="config-teal" href="{{ route('estoque.deposit.listing') }}" wire:navigate>
                    <i class="bi bi-shop-window"></i>
                    <br>
                    <h1 class="font-bold text-2xl pt-2">Depósitos</h1>
                </a>
            </div>

            <div class="grid col-span-1">
                <a class="config" href="{{ route('natureza_operacao.listing') }}" wire:navigate>
                    <i class="bi bi-building-check"></i>
                    <br>
                    <h1 class="font-bold text-2xl pt-2">Natureza de Operação</h1>
                </a>
            </div>

            <div class="grid col-span-1">
                <a class="config-teal" href="#" wire:navigate>
                    <i class="bi bi-award"></i>
                    <br>
                    <h1 class="font-bold text-2xl pt-2">Bonificações</h1>
                </a>
            </div>

            <div class="grid col-span-1">
                <a class="config-orange" href="{{ route('estoque.listing') }}" wire:navigate>
                    <i class="bi bi-boxes"></i>
                    <br>
                    <h1 class="font-bold text-2xl pt-2">Estoque</h1>
                </a>
            </div>
            
        </div>
    </div>
</div>