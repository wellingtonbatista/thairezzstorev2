<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Fornecedores</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <button class="btn-success">
                    <a href="{{ route('fornecedor.create') }}" wire:navigate>Novo Fornecedor</a>
                </button>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-sm font-bold text-black text-center">#id</th>
                            <td class="text-sm font-bold text-black">Nome</td>
                            <td class="text-sm font-bold text-black">Limite de Compra</td>
                            <td class="text-sm font-bold text-black text-center">Detalhes</td>
                            <td class="text-sm font-bold text-black text-center">Excluir</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <th class="text-center py-4">{{ $fornecedor->id }}</th>
                                <td class="py-4">{{ $fornecedor->nome }}</td>

                                <td class="py-4">
                                    {{ $fornecedor->limite_compra ? Number::currency($fornecedor->limite_compra, in: 'BRL') : "N/A" }}
                                </td>

                                <td class="text-center py-4">
                                    <button class="btn-warning">
                                        <a href="{{ route('fornecedor.details', ['id' => $fornecedor->id]) }}" wire:navigate>
                                            <i class="bi bi-view-list"></i>
                                        </a>
                                    </button>
                                </td>

                                <td class="text-center py-4">
                                    <button class="btn-danger" wire:click="delete_fornecedor({{$fornecedor->id}})">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
