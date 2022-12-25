<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->get('/', function () {
        $composerJson = json_decode(file_get_contents(__DIR__ . '/../composer.json'));

        return response()->json([
            'information' => [
                'version' => 'v1',
                'authors' => $composerJson->authors,
                'errors' => null
            ],
            'data' => null
        ]);
    });
    $router->get('{ipAddress}', ['uses' => 'WhoisController@getWhois']);
    $router->get('{ipAddress}/abuseMail', ['uses' => 'WhoisController@getAbuseMail']);
});
