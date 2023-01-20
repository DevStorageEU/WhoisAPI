<?php declare(strict_types=1);

use Devstorage\Controller\WhoisController;
use Devstorage\Router;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $router = new Router([
        WhoisController::class
    ]);

    if ($match = $router->match()) {
        $controller = new $match['class']();
        $controller->{$match['method']}(...$match['params']);
    }

} catch (Throwable $exception) {
    $json = [
        'information' => [
            'status' => 500,
            'message' => $exception->getMessage(),
        ],
        'data' => []
    ];

    http_response_code(500);
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($json, JSON_PRETTY_PRINT);
}