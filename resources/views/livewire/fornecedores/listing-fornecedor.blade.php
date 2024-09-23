<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Fornecedores</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <div>
                    <button class="btn-warning me-2">
                        <a href="{{ route('config.listing') }}" wire:navigate>Voltar</a>
                    </button>
                    <button class="btn-success">
                        <a href="{{ route('fornecedor.create') }}" wire:navigate>Novo Fornecedor</a>
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
                            <th class="text-sm font-bold text-black text-start">#id</th>
                            <td class="text-sm font-bold text-black">Nome</td>
                            <td class="text-sm font-bold text-black">Limite de Compra</td>
                            <td"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <th class="text-start py-4">{{ $fornecedor->id }}</th>
                                <td class="py-4">{{ $fornecedor->nome }}</td>

                                <td class="py-4">
                                    {{ $fornecedor->limite_compra ? Number::currency($fornecedor->limite_compra, in: 'BRL') : "N/A" }}
                                </td>

                                <td class="text-end py-4">
                                    <div class="dropdown dropdown-end">
                                        <div tabindex="0" role="button" class="btn-warning m-1"><i class="bi bi-list"></i></div>
                                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                          <li>
                                            <a href="{{ route('fornecedor.details', ['id' => $fornecedor->id]) }}">Detalhes</a>
                                          </li>
                                          <li>
                                            <button wire:click="ArquivarFornecedor({{$fornecedor->id}})">Arquivar</button>
                                          </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
