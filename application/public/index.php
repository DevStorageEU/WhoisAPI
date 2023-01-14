<?php declare(strict_types=1);

use Devstorage\Router;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $router = new Router([
        IndexController::class
    ]);

    if ($match = $router->match()) {
        $controller = new $match['class']();
        $controller->{$match['method']}(...$match['params']);
    }

} catch (Throwable $exception) {
    echo $exception->getMessage();
}