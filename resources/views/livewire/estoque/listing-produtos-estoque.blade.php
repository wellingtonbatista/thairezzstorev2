<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1">
                <h1 class="titulo">Produtos em Estoque</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <a href="{{ route('config.listing') }}" wire:navigate class="btn-warning">Voltar</a>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table table-">
                    <thead>
                        <tr>
                            <th class="text-sm font-bold text-black">#Id</th>
                            <td class="text-sm font-bold text-black">Nome:</td>
                            <td class="text-sm font-bold text-black text-center">Quantidade</td>
                            <td class="text-sm font-bold text-black text-center">Bonificação</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <th class="py-4">{{ $produto->id }}</th>
                                <td class="py-4">{{ $produto->nome }}</td>
                                <td class="py-4 text-center">{{ $produto->estoque }}</td>
                                <td class="py-4 text-center">{{ $produto->estoque_bonificacao }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
