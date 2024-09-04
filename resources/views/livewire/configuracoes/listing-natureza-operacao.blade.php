<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Natureza de Operação</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <div>
                    <button class="btn-warning me-2">
                        <a href="{{ route('config.listing') }}" wire:navigate>Voltar</a>
                    </button>
                    <button class="btn-success">
                        <a href="{{ route('natureza_operacao.create') }}" wire:navigate>Nova Natureza de Operação</a>
                    </button>
                </div>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-sm font-bold text-black">#Id</th>
                            <td class="text-sm font-bold text-black">Tipo Movimentação</td>
                            <td class="text-sm font-bold text-black">Nome</td>
                            <td class="text-sm font-bold text-black text-center">Detalhes</td>
                            <td class="text-sm font-bold text-black text-center">Apagar</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($natureza_operacao as $item)
                            <tr>
                                <th class="py-4">{{ $item->id }}</th>
                                <td class="py-4">
                                    @if ($item->tipo_movimentacao == '0')
                                        Entrada
                                    @else
                                        Saida
                                    @endif
                                </td>
                                <td class="py-4">{{ $item->nome }}</td>
                                <td class="text-center py-4">
                                    <a href="{{ route('natureza_operacao.details', ['id_natureza_operacao' => $item->id]) }}" wire:navigate class="btn-warning"><i class="bi bi-view-list"></i></a>
                                </td>
                                <td class="text-center py-4">
                                    <button class="btn-danger" wire:click="apagar_natureza_operacao({{$item->id}})"><i class="bi bi-trash3"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>