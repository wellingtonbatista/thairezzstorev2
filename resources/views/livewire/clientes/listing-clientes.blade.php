<div>
    <div class="box">
        <div class="grid grid-cols-2">
            <div class="grid col-span-1 justify-self-start">
                <h1 class="titulo">Filtros</h1>
            </div>
            <div class="grid col-span-1 justify-self-end">
                <button wire:click="LimparFiltroCliente" class="btn-warning">Limpar</button>
            </div>
        </div>

        <hr class="my-4">

        <div class="grid grid-cols-10 mb-4 gap-4">
            <div class="grid col-span-2">
                <label for="status_cliente" class="label-input-text">Status:</label>
                <select class="input-text" name="status_cliente" wire:model.live="status_cliente">
                    <option selected>Ativos</option>
                    <option value="ativo">Inativos</option>
                </select>
            </div>
            <div class="grid col-span-8">
                <label for="nome_cliente" class="label-input-text">Nome Cliente:</label>
                <input type="text" name="nome_cliente" wire:model.live="nome_cliente" class="input-text">
            </div>
        </div>
    </div>

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
                            <td class="py-4"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <th class="py-4">{{ $cliente->nome }}</th>
                                <td class="py-4 text-center">{{ $cliente->documento }}</td>
                                <td class="py-4 text-center">{{ date('d/m/Y', strtotime($cliente->data_nascimento)) }}</td>
                                <td class="text-end">
                                    <div class="dropdown dropdown-end">
                                        <div tabindex="0" role="button" class="btn-warning m-1"><i class="bi bi-list"></i></div>
                                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                          <li>
                                            <a href="{{ route('cliente.details', ['id_cliente' => $cliente->id]) }}">Detalhes</a>
                                          </li>
                                          <li>
                                            @if ($cliente->deleted_at == null)
                                                <button wire:click="ArquivarCliente({{$cliente->id}})">Arquivar</button>
                                            @else
                                                <button wire:click="DesarquivarCliente({{$cliente->id}})">Desarquivar</button>
                                            @endif
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