<?php

Route::get('/', 'HomeController@index')->name('index');

Route::group(['prefix' => 'produtos', 'as' => 'produtos.'], function(){
    Route::get('/', 'ProdutosController@index')->name('index');
});