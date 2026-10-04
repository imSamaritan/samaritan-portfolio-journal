<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// 1. Load Environment Variables (.env)
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->safeLoad();
}

// 2. Build PSR-11 Container
$container = require __DIR__ . '/../config/container.php';
AppFactory::setContainer($container);

// 3. Create Slim Application
$app = AppFactory::create();

// 4. Auto-detect or configure Base Path for WAMP / subdirectories
$appUrl = $_ENV['APP_URL'] ?? '';
$basePath = parse_url($appUrl, PHP_URL_PATH);
if (!empty($basePath) && $basePath !== '/') {
    $app->setBasePath(rtrim($basePath, '/'));
}

// 5. Register Middlewares
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();

$displayErrors = filter_var($_ENV['APP_DEBUG'] ?? true, FILTER_VALIDATE_BOOLEAN);
$errorMiddleware = $app->addErrorMiddleware($displayErrors, true, true);

// 6. Register Routes
$routes = require __DIR__ . '/../config/routes.php';
$routes($app);

// 7. Run App
$app->run();
