<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Detalhes Cliente</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <button class="btn-warning">
                    <a href="{{ route('cliente.listing') }}" wire:navigate>Voltar</a>
                </button>
            </div>
        </div>

        <hr class="divisor">

        <x-mary-tabs wire:model="selectedTab">
            <x-mary-tab name="dados-tab" label="Dados Cadastro" icon="o-users">
                <div class="mt-10">
                    <div class="grid grid-cols-1">
                        <div class="grid col-span-1">
                            <label for="nome_cliente" class="label-input-text">
                                Nome:
                                @error('nome_cliente')
                                    <span class="text-red-600">Campo Obrigatorio!</span>
                                @enderror
                            </label>
                            <input type="text" name="nome_cliente" class="input-text" wire:model="nome_cliente">
                        </div>
                    </div>
            
                    <br class="my-5">
            
                    <div class="grid grid-cols-3 gap-4">
                        <div class="grid col-span-1">
                            <label for="documento_cliente" class="label-input-text">Documento:</label>
                            <input type="text" name="documento_cliente" class="input-text" wire:model="documento_cliente">
                        </div>
                        <div class="grid col-span-1">
                            <label for="contato_cliente" class="label-input-text">Contato:</label>
                            <input type="text" name="contato_cliente" class="input-text" wire:model="contato_cliente">
                        </div>
                        <div class="grid col-span-1">
                            <label for="documento_cliente" class="label-input-text">Data Nascimento:</label>
                            <input type="date" name="documento_cliente" class="input-text" wire:model="data_nascimento_cliente">
                        </div>
                    </div>
            
                    <br class="my-5">
            
                    <div class="text-end">
                        <button class="btn-success" wire:click="update_cliente">Atualizar</button>
                    </div>
                </div>
            </x-mary-tab>
            <x-mary-tab name="pedidos-tab" label="Pedidos" icon="o-shopping-bag">
                <div class="mt-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-sm text-black font-bold">#</th>
                                <td class="text-sm text-black font-bold">Data da Venda</td>
                                <td class="text-sm text-black font-bold">Pedido Referencial</td>
                                <td class="text-sm text-black font-bold">Natureza de Operação</td>
                                <td class="text-sm text-black font-bold"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <th class="py-4">{{ $pedido->id }}</th>
                                    <td class="py-4">{{ date('d/m/Y', strtotime($pedido->data_venda)) }}</td>
                                    <td class="py-4">{{ $pedido->pedido_referencial }}</td>
                                    <td class="py-4">{{ $pedido->natureza_operacao->nome }}</td>
                                    <td class="py-4 text-end">
                                        <a href="{{ route('pedidos.details', ['id_pedido' => $pedido->id]) }}" target="_blank" class="btn-emerald"><i class="bi bi-box-arrow-up-right"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-10">
                        {{ $pedidos->links() }}
                    </div>
                </div>
            </x-mary-tab>
            <x-mary-tab name="faturas-tab" label="Contas em Aberto" icon="o-wallet">
                <div class="mt-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="text-sm text-black font-bold">#</td>
                                <td class="text-sm text-black font-bold text-center">Pedido</td>
                                <td class="text-sm text-black font-bold text-center">Data de Vencimento</td>
                                <td class="text-sm text-black font-bold text-center">Valor da Parcela</td>
                                <td class="text-sm text-black font-bold"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faturas as $fatura)
                                @foreach ($fatura->contas_receber as $parcela)
                                    <tr>
                                        <td class="py-4">{{ $parcela->id }}</td>
                                        <td class="py-4 text-center">{{ $parcela->pedido_id }}</td>
                                        <td class="py-4 text-center">{{ date('d/m/Y', strtotime($parcela->data_vencimento)) }}</td>
                                        <td class="py-4 text-center">{{ Number::currency($parcela->valor_parcela, in: "BRL") }}</td>
                                        <td class="py-4 text-end">
                                            @if ($parcela)
                                                
                                            @else
                                                
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    <div class="my-10">
                        {{ $faturas->links() }}
                    </div>
                </div>
            </x-mary-tab>
        </x-mary-tabs>

        
    </div>
</div>