<div>
    <div class="box">
        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <h1 class="titulo">Contas Á Receber</h1>
            </div>
        </div>

        <hr class="divisor">

        <table class="table">
            <thead>
                <tr>
                    <th class="text-sm font-bold text-black">#</th>
                    <td class="text-sm font-bold text-black">Pedido Referencial:</td>
                    <td class="text-sm font-bold text-black">Cliente:</td>
                    <td class="text-sm font-bold text-black">Data de Vencimento:</td>
                    <td class="text-sm font-bold text-black">Valor Parcela:</td>
                    <td class="text-sm font-bold text-black">Status:</td>
                    <td class="text-sm font-bold text-black"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($contas_abertas as $conta)
                    <tr>
                        <th class="py-4">{{ $conta->pedido_id }}</th>
                        <td class="py-4">{{ $conta->pedido->pedido_referencial }}</td>
                        <td class="py-4">{{ $conta->pedido->cliente->nome }}</td>
                        <td class="py-4">{{ date('d/m/Y', strtotime($conta->data_vencimento)) }}</td>
                        <td class="py-4">{{ Number::currency($conta->valor_parcela, in: "BRL") }}</td>
                        <td class="py-4">
                            @if ($conta->pagamento)
                                <x-mary-badge value="Pago" class="badge-success" />
                            @else
                                @if ($conta->data_vencimento < date('Y-m-d'))
                                    <x-mary-badge value="Atrasado" class="badge-error" />
                                @else
                                    <x-mary-badge value="Aberto" class="badge-info" />
                                @endif
                            @endif
                        </td>
                        <td class="text-end py-4">
                            @if (!$conta->pagamento)
                                <button wire:click="ContaPaga({{$conta->id}})" class="btn-success"><i class="bi bi-check2-all"></i></button>
                            @else
                                <button class="btn-danger" wire:click="ExtornarContaPaga({{$conta->id}})"><i class="bi bi-x-lg"></i></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-10">
            {{ $contas_abertas->links() }}
        </div>
    </div>
</div>
