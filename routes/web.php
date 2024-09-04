<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', App\Livewire\Dashboard::class)->name('dashboard');
});

Route::get('fornecedores/create', App\Livewire\Fornecedores\CreateFornecedor::class)->middleware('auth')->name('fornecedor.create');
Route::get('fornecedores/listing', App\Livewire\Fornecedores\ListingFornecedor::class)->middleware('auth')->name('fornecedor.listing');
Route::get('fornecedores/details/{id}', App\Livewire\Fornecedores\DetailsFornecedor::class)->middleware('auth')->name('fornecedor.details');

Route::get('produtos/create', App\Livewire\Produtos\CreateProduto::class)->middleware('auth')->name('produtos.create');
Route::get('produtos/listing', App\Livewire\Produtos\ListingProduto::class)->middleware('auth')->name('produtos.listing');
Route::get('produtos/details/{id_produto}', App\Livewire\Produtos\DetailsProduto::class)->middleware('auth')->name('produtos.details');

Route::get('estoque/listing', App\Livewire\Estoque\ListingEstoque::class)->middleware('auth')->name('estoque.listing');
Route::get('estoque/create', App\Livewire\Estoque\CreateEstoque::class)->middleware('auth')->name('estoque.create');
Route::get('estoque/deposit/listing', App\Livewire\Estoque\ListingDepositEstoque::class)->middleware('auth')->name('estoque.deposit.listing');
Route::get('estoque/deposit/create', App\Livewire\Estoque\CreateDepositEstoque::class)->middleware('auth')->name('estoque.deposit.create');
Route::get('estoque/deposit/details/{id_deposito}', App\Livewire\Estoque\DetailsDepositoEstoque::class)->middleware('auth')->name('estoque.deposit.details');

Route::get('clientes/listing', App\Livewire\Clientes\ListingClientes::class)->middleware('auth')->name('cliente.listing');
Route::get('clientes/create', App\livewire\Clientes\CreateClientes::class)->middleware('auth')->name('cliente.create');
Route::get('clientes/details/{id_cliente}', App\Livewire\Clientes\DetailsClientes::class)->middleware('auth')->name('cliente.details');

Route::get('pedidos/listing', App\Livewire\Pedidos\ListingPedidos::class)->middleware('auth')->name('pedidos.listing');
Route::get('pedidos/create', App\Livewire\Pedidos\CreatePedidos::class)->middleware('auth')->name('pedidos.create');
Route::get('pedidos/details/{id_pedido}', App\Livewire\Pedidos\DetailsPedidos::class)->middleware('auth')->name('pedidos.details');

Route::get('configuracoes/natureza_operacao/listing', App\Livewire\Configuracoes\ListingNaturezaOperacao::class)->middleware('auth')->name('natureza_operacao.listing');
Route::get('configuracoes/natureza_operacao/create', App\Livewire\Configuracoes\CreateNaturezaOperacao::class)->middleware('auth')->name('natureza_operacao.create');
Route::get('configuracoes/natureza_operacao/details/{id_natureza_operacao}', App\Livewire\Configuracoes\DetailsNaturezaOperacao::class)->middleware('auth')->name('natureza_operacao.details');
Route::get('configuracoes/listing', App\Livewire\Configuracoes\Listing::class)->middleware('auth')->name('config.listing');