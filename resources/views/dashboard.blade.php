<div>
    <div class="box">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 mt-10">
            <div class="grid col-span-1">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-secondary text-4xl">
                            <i class="bi bi-bag-check"></i>
                        </div>
                        <div class="stat-title text-lg dark:text-white">Produtos Cadastrados:</div>
                        <div class="stat-value text-secondary">{{ $produtos_cadastrados }}</div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="grid col-span-1 mt-3 lg:mt-0">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-primary text-4xl">
                            <i class="bi bi-boxes"></i>
                        </div>
                        <div class="stat-title text-lg dark:text-white">Valor de Estoque:</div>
                        <div class="stat-value text-primary">{{ Number::currency($valor_total_estoque, in: "BRL") }}</div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="grid col-span-1 mt-3 lg:mt-0">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-accent text-4xl">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div class="stat-title text-lg dark:text-white">Valor de Investimento:</div>
                        <div class="stat-value text-accent">{{ Number::currency($valot_total_investido, in: "BRL") }}</div>
                        <br>
                    </div>
                </div>
            </div>

            
            
            <div class="grid col-span-1 mt-3 lg:mt-0">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-success text-4xl">
                            <i class="bi bi-piggy-bank"></i>
                        </div>
                        <div class="stat-title text-lg dark:text-white">Lucro Total do Estoque:</div>
                        <div class="stat-value text-success">{{ Number::currency($lucro_total_estoque, in: "BRL") }}</div>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <hr class="divisor-2">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 mb-10">
            <div class="grid col-span-1">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-info text-4xl">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <div class="stat-title text-lg dark:text-white">Total A Receber:</div>
                        <div class="stat-value text-info">{{ Number::currency($contas_aberto, in: "BRL") }}</div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="grid col-span-1 mt-3 lg:mt-0">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-warning text-4xl">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <div class="stat-title text-lg dark:text-white">Total Vendido:</div>
                        <div class="stat-value text-warning">{{ Number::currency($valor_vendido_ultimos_dias, in: "BRL") }}</div>
                        <div class="stat-desc dark:text-white">{{ date('d/m/Y', strtotime($data_final_vendas)) }} á {{ date('d/m/Y', strtotime($data_inicial_vendas)) }}</div>
                    </div>
                </div>
            </div>
            <div class="grid col-span-1"></div>
            <div class="grid col-span-1"></div>
        </div>
    </div>  
</div>