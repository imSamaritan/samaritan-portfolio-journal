<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    // View Renderer Definition (Slim PHP-View)
    PhpRenderer::class => function (ContainerInterface $c) {
        $renderer = new PhpRenderer(__DIR__ . '/../templates');
        $renderer->setLayout('layouts/main.php');
        $renderer->addAttribute('appName', $_ENV['APP_NAME'] ?? 'Portfolio & Journal');
        $renderer->addAttribute('appUrl', $_ENV['APP_URL'] ?? '');
        return $renderer;
    },

    // PDO Database Connection Definition (loaded directly from .env)
    PDO::class => function (ContainerInterface $c) {
        $host = $_ENV['DB_HOST'] ?? '127.0.0.1';
        $port = $_ENV['DB_PORT'] ?? '3306';
        $db   = $_ENV['DB_NAME'] ?? 'portfolio_db';
        $user = $_ENV['DB_USER'] ?? 'root';
        $pass = $_ENV['DB_PASS'] ?? '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host={$host};port={$port};dbname={$db};charset={$charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        return new PDO($dsn, $user, $pass, $options);
    },
]);

return $containerBuilder->build();
