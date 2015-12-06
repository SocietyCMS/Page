<?php

$router->get('page/{uri}', ['uses' => 'PublicController@uri', 'as' => 'page']);
//$router->get('/', ['uses' => 'PublicController@homepage', 'as' => 'homepage']);
