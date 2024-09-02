<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Depositos</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <div>
                    <button class="btn-warning me-2">
                        <a href="{{ route('estoque.listing') }}" wire:navigate>Voltar</a>
                    </button>
                    <button class="btn-success">
                        <a href="{{ route('estoque.deposit.create') }}" wire:navigate>Novo Deposito</a>
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
                            <th class="text-sm font-bold text-black text-start">#Id</th>
                            <td class="text-sm font-bold text-black">Nome</td>
                            <td class="text-sm font-bold text-black text-end">Detalhes</td>
                            <td class="text-sm font-bold text-black text-end">Apagar</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($depositos as $deposito)
                            <tr>
                                <th class="text-start py-4">{{ $deposito->id }}</th>
                                <td class="py-4">{{ $deposito->nome }}</td>

                                <td class="text-end py-4">
                                    <button class="btn-warning">
                                        <a href="{{ route('estoque.deposit.details', ['id_deposito' => $deposito->id]) }}" wire:navigate><i class="bi bi-view-list"></i></a>
                                    </button>
                                </td>

                                <td class="text-end py-4">
                                    <button class="btn-danger" type="button" wire:click="delete_deposito({{$deposito->id}})"><i class="bi bi-trash3"></i></button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
