<div>
    <div class="box">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Estoque</h1>
            </div>
            <div class="grid col-span-1 lg:justify-self-end mt-7 lg:mt-0">
                <div>
                    <a href="{{ route('config.listing') }}" wire:navigate class="btn-warning lg:me-2">Voltar</a>
                    <a href="{{ route('estoque.create') }}" wire:navigate class="btn-success">Nova Movimentacao</a>
                </div>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table">
                    <thead>
                        <tr>
                            <td></td>
                            <td class="font-bold text-sm text-black text-start">Produto</td>
                            <td class="font-bold text-sm text-black text-center">Deposito</td>
                            <td class="font-bold text-sm text-black text-center">Tipo</td>
                            <td class="font-bold text-sm text-black text-center">Quantidade</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estoques as $estoque)
                            <tr>
                                <td>
                                    @if ($estoque->natureza_operacao->tipo_movimentacao == "0")
                                        <span class="text-green-600"><i class="bi bi-caret-up-fill"></i></span>
                                    @else
                                        <span class="text-red-600"><i class="bi bi-caret-down-fill"></i></span>
                                    @endif
                                </td>
                                <td class="py-4 text-start">{{ $estoque->produto->nome }}</td>
                                <td class="py-4 text-center">{{ $estoque->deposito->nome }}</td>
                                <td class="py-4 text-center capitalize">{{ $estoque->natureza_operacao->tipo_movimentacao == "0" ? "Entrada" : "Saida" }}</td>
                                <td class="py-4 text-center">{{ $estoque->quantidade }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
