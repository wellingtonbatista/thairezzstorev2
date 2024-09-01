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

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table">
                    <thead>
                        <tr>
                            <td></td>
                            <th class="text-sm font-bold text-black text-start">Cod. Interno</th>
                            <td class="text-sm font-bold text-black text-start">Nome</td>
                            <td class="text-sm font-bold text-black text-end">Fornecedor</td>
                            <td class="text-sm font-bold text-black text-center">Valor</td>
                            <td class="text-sm font-bold text-black text-center">Estoque</td>
                            <td class="text-sm font-bold text-black text-center">Detalhes</td>
                            <td class="text-sm font-bold text-black text-center">Apagar</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>
                                    <div class="avatar bg-transparent">
                                        <div class="mask mask-squircle w-12">
                                            <img src="{{ asset('photos/'.$produto->img) }}" />
                                        </div>
                                    </div>
                                </td>
                                <th class="py-4 text-start">{{ $produto->codigo_interno }}</th>
                                <td class="py-4 text-start">{{ $produto->nome }}</td>
                                <td class="py-4 text-end">{{ $produto->fornecedor->nome }}</td>
                                <td class="py-4 text-center">{{ Number::currency($produto->valor_venda, in: 'BRL') }}</td>
                                <td class="py-4 text-center">{{ $produto->estoque }}</td>

                                <td class="py-4 text-center">
                                    <button class="btn-warning">
                                        <a href=""><i class="bi bi-view-list"></i></a>
                                    </button>
                                </td>

                                <td class="py-4 text-center">
                                    <button class="btn-danger" wire:click="delete_produto({{$produto->id}})"><i class="bi bi-trash3"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
   </div>
</div>
