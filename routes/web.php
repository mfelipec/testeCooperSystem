<?php

Route::get('/', 'HomeController@index')->name('index');

Route::group(['prefix' => 'produtos', 'as' => 'produtos.'], function(){
    Route::get('/', 'ProdutosController@index')->name('index');
    Route::get('/create', 'ProdutosController@create')->name('create');
    Route::post('/store', 'ProdutosController@store')->name('store');
    Route::get('/show/{id}', 'ProdutosController@show')->name('show');
    Route::get('/edit/{id}', 'ProdutosController@edit')->name('edit');
    Route::patch('/update/{id}', 'ProdutosController@update')->name('update');
    Route::delete('/destroy/{id}', 'ProdutosController@destroy')->name('destroy');

    Route::get('/dados', 'ProdutosController@getDados')->name('dados');
});

Route::group(['prefix' => 'pedidos', 'as' => 'pedidos.'], function(){
    Route::get('/', 'PedidosController@index')->name('index');
    Route::get('/create', 'PedidosController@create')->name('create');
    Route::post('/store', 'PedidosController@store')->name('store');
    Route::get('/show/{id}', 'PedidosController@show')->name('show');
    Route::get('/edit/{id}', 'PedidosController@edit')->name('edit');
    Route::patch('/update/{id}', 'PedidosController@update')->name('update');
    Route::delete('/destroy/{id}', 'PedidosController@destroy')->name('destroy');
});