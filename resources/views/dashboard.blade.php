<div>
    <div class="box">
        <div class="grid grid-cols-4 gap-4">
            <div class="grid col-span-1">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-secondary text-4xl">
                            <i class="bi bi-bag-check"></i>
                        </div>
                        <div class="stat-title text-lg">Produtos Cadastrados:</div>
                        <div class="stat-value text-secondary">{{ $produtos_cadastrados }}</div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="grid col-span-1">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-primary text-4xl">
                            <i class="bi bi-boxes"></i>
                        </div>
                        <div class="stat-title text-lg">Valor de Estoque:</div>
                        <div class="stat-value text-primary">{{ Number::currency($valor_total_estoque, in: "BRL") }}</div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="grid col-span-1">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-accent text-4xl">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div class="stat-title text-lg">Valor de Investimento:</div>
                        <div class="stat-value text-accent">{{ Number::currency($valot_total_investido, in: "BRL") }}</div>
                        <br>
                    </div>
                </div>
            </div>

            
            
            <div class="grid col-span-1">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-success text-4xl">
                            <i class="bi bi-piggy-bank"></i>
                        </div>
                        <div class="stat-title text-lg">Lucro Total do Estoque:</div>
                        <div class="stat-value text-success">{{ Number::currency($lucro_total_estoque, in: "BRL") }}</div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>