<?php

$router->get('page/{uri}', ['uses' => 'PublicController@uri', 'as' => 'page']);
