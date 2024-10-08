<div>
    <div class="box">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-7">
            <div class="grid col-span-1">
                <a class="config-cyan" href="{{ route('estoque.produto.listing') }}" wire:navigate>
                    <i class="bi bi-boxes"></i>
                    <br>
                    <h1 class="font-bold lg:text-2xl text-xl pt-2">Estoque</h1>
                </a>
            </div>

            <div class="grid col-span-1">
                <a class="config-teal" href="{{ route('estoque.deposit.listing') }}" wire:navigate>
                    <i class="bi bi-shop-window"></i>
                    <br>
                    <h1 class="font-bold lg:text-2xl text-xl pt-2">Depósitos</h1>
                </a>
            </div>

            <div class="grid col-span-1">
                <a class="config" href="{{ route('natureza_operacao.listing') }}" wire:navigate>
                    <i class="bi bi-building-check"></i>
                    <br>
                    <h1 class="font-bold lg:text-2xl text-xl pt-2">Natureza de Operação</h1>
                </a>
            </div>

            <div class="grid col-span-1">
                <a class="config-sky" href="{{ route('estoque.listing') }}" wire:navigate>
                    <i class="bi bi-database-fill-gear"></i>
                    <br>
                    <h1 class="font-bold lg:text-2xl text-xl pt-2">Movimentação de Estoque</h1>
                </a>
            </div>
            
        </div>

        <hr class="my-5">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-7">
            <div class="grid col-span-1">
                <a class="config-neutral" href="{{ route('fornecedor.listing') }}" wire:navigate>
                    <i class="bi bi-buildings"></i>
                    <br>
                    <h1 class="font-bold lg:text-2xl text-xl pt-2">Fornecedores</h1>
                </a>
            </div>
            <div class="grid col-span-1">
                <a class="config-orange" href="{{ route('calc.shopee') }}" wire:navigate>
                    <i class="bi bi-calculator"></i>
                    <br>
                    <h1 class="font-bold lg:text-2xl text-xl pt-2">Calculadora Shopee</h1>
                </a>
            </div>
            <div class="grid col-span-1"></div>
            <div class="grid col-span-1">
                <a class="config-indigo" href="{{ route('config.variaveis_ambiente') }}" wire:navigate>
                    <i class="bi bi-braces-asterisk"></i>
                    <br>
                    <h1 class="font-bold lg:text-2xl text-xl pt-2">Variáveis de Ambiente</h1>
                </a>
            </div>
        </div>

        <hr class="my-5">

    </div>
</div>