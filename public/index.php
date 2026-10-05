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

// 4. Dynamically detect Base Path & App URL (supports VirtualHost domains & WAMP subdirectories)
$uriPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$configuredAppUrl = $_ENV['APP_URL'] ?? '';
$configuredPath = rtrim(parse_url($configuredAppUrl, PHP_URL_PATH) ?? '', '/');

if (!empty($configuredPath) && str_starts_with($uriPath, $configuredPath)) {
    $basePath = $configuredPath;
} else {
    $basePath = '';
}

$app->setBasePath($basePath);

// Sync PhpRenderer view attributes with the active virtual host and base path
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? parse_url($configuredAppUrl, PHP_URL_HOST) ?? 'localhost';
$currentAppUrl = $basePath !== '' ? "{$scheme}://{$host}{$basePath}" : "{$scheme}://{$host}";

/** @var \Slim\Views\PhpRenderer $renderer */
$renderer = $container->get(\Slim\Views\PhpRenderer::class);
$renderer->addAttribute('appUrl', $currentAppUrl);
$renderer->addAttribute('basePath', $basePath);

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
