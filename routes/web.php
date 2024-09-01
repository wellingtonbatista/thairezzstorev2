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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('fornecedores/create', App\Livewire\Fornecedores\CreateFornecedor::class)->middleware('auth')->name('fornecedor.create');
Route::get('fornecedores/listing', App\Livewire\Fornecedores\ListingFornecedor::class)->middleware('auth')->name('fornecedor.listing');
Route::get('fornecedores/details/{id}', App\Livewire\Fornecedores\DetailsFornecedor::class)->middleware('auth')->name('fornecedor.details');

Route::get('produtos/create', App\Livewire\Produtos\CreateProduto::class)->middleware('auth')->name('produtos.create');
Route::get('produtos/listing', App\Livewire\Produtos\ListingProduto::class)->middleware('auth')->name('produtos.listing');
Route::get('produtos/details/{id}', App\Livewire\Produtos\DetailsProduto::class)->middleware('auth')->name('produtos.details');