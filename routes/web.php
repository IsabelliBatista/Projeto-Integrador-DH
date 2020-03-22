<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|phploaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rotas Guest
Route::get('/', function () {
    return view('index');
});

Route::get('/parceiros', function(){
    return view('institucional.parceiros');
});

Route::get('/quemsomos', function(){
    return view('institucional.quemsomos');
});

Route::get('/politica', function(){
    return view('institucional.politica');
});

Route::get('/contato', function(){
    return view('institucional.contato');
});

Route::get('/faq', function(){
    return view('institucional.faq');
});

Route::get('/carrinho', function(){
    return view('comprar.carrinho');
});

Route::get('/comprar', function(){
    return view('comprar.comprar');
});

Route::get('/checkout', function(){
    return view('comprar.checkout');
});

Route::get('/loja', function(){
    return view('produtos.loja');
});

Route::get('/finalCompras', function(){
    return view('comprar.finalCompras');
});

//Rotas do Cadastro do Usuario
Route::get('/cadastrarUsuario', function(){
    return view('usuario.cadastrarUsuario');
});

Route::post('/cadastrarUsuario', 'UserController@create')->name('cadastrarUsuario');

Auth::routes();

Route::middleware(['auth'])->group(function (){
    
    Route::get('/home', 'HomeController@index')->name('home');

    //Rotas do Usuario
    Route::get('/listar/usuario','UserController@listandoUsuario');
    Route::get('/editar/usuario','UserController@editarUsuario');
    Route::put('/editar/usuario','UserController@atualizarUsuario');

    //Rotas Categorias
    Route::get('/adicionando/C', function(){
        return view('categorias.adicionandoC');
    });
    Route::post('/adicionandoC', 'CategoriasController@create')->name('adicionandoC');
    Route::get('/listar/categoria','CategoriasController@listandoCategoria');
    Route::get('/editar/categ','CategoriasController@editarCategoria');
    Route::put('/editar/categ','CategoriasController@atualizarCategoria');

    //Rotas Produtos
    Route::get('/cadastrarProdutos', 'ProdutosController@pegarCategoriaMarca');
    Route::post('/cadastrarProdutos', 'ProdutosController@create')->name('produtos');

    //Rotas Marcas
    Route::get('/adicionandoM', function(){
        return view('marcas.adicionandoM');
    });
    Route::post('/adicionandoM', 'MarcasController@create')->name('adicionandoM');
    
});

    
Route::get('/minha-conta', function(){
    return view('minhaConta');
});

Route::get('/minha-conta?type=pedidos', function(){
    return view('minhaConta');
});

