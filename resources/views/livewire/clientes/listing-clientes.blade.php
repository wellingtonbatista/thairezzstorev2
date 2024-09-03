<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Clientes</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <button class="btn-success">
                    <a href="{{ route('cliente.create') }}" wire:navigate>Novo Cliente</a>
                </button>
            </div>
        </div>

        <hr class="divisor">

        <div class="grid grid-cols-1">
            <div class="grid col-span-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-sm font-bold text-black text-start">Nome</th>
                            <td class="text-sm font-bold text-black text-center">Documento</td>
                            <td class="text-sm font-bold text-black text-center">Data de Nascimento</td>
                            <td class="text-sm font-bold text-black text-center">Detalhes</td>
                            <td class="text-sm font-bold text-black text-end">Apagar</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <th class="py-4">{{ $cliente->nome }}</th>
                                <td class="py-4 text-center">{{ $cliente->documento }}</td>
                                <td class="py-4 text-center">{{ date('d/m/Y', strtotime($cliente->data_nascimento)) }}</td>
                                <td class="py-4 text-center">
                                    <button class="btn-warning">
                                        <a href="{{ route('cliente.details', ['id_cliente' => $cliente->id]) }}" wire:navigate><i class="bi bi-view-list"></i></a>
                                    </button>
                                </td>
                                <td class="py-4 text-end">
                                    <button class="btn-danger" wire:click="delete_cliente({{$cliente->id}})"><i class="bi bi-trash3"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>