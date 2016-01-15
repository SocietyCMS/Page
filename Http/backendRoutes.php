<?php

$router->group(['prefix' => '/page'], function ($router) {
    // Page
    $router->group(['middleware' => ['permission:page::manage-page']], function () {
        get('pages', ['as' => 'backend::page.pages.index', 'uses' => 'PageController@index']);
        get('pages/create', ['as' => 'backend::page.pages.create', 'uses' => 'PageController@create']);
        post('pages', ['as' => 'backend::page.pages.store', 'uses' => 'PageController@store']);
        get('pages/{slug}/edit', ['as' => 'backend::page.pages.edit', 'uses' => 'PageController@edit']);
        put('pages/{slug}/edit', ['as' => 'backend::page.pages.update', 'uses' => 'PageController@update']);
        delete('pages/{slug}', ['as' => 'backend::page.pages.destroy', 'uses' => 'PageController@destroy']);
    });
});
