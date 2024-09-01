<div>
   <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Produtos</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <button class="btn-success">
                    <a href="{{ route('produtos.create') }}" wire:navigate>Novo Produto</a>
                </button>
            </div>
        </div>

        <hr class="divisor">
        
   </div>
</div>
