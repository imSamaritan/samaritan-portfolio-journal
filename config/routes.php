<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Views\PhpRenderer;

return function (App $app) {
    // Web Page Routes
    $app->get('/', function (Request $request, Response $response) {
        $renderer = $this->get(PhpRenderer::class);
        return $renderer->render($response, 'pages/home.php', [
            'pageTitle' => 'Home & Overview',
            'currentNav' => 'home',
        ]);
    });

    $app->get('/about', function (Request $request, Response $response) {
        $renderer = $this->get(PhpRenderer::class);
        return $renderer->render($response, 'pages/about.php', [
            'pageTitle' => 'About Me & What I Do',
            'currentNav' => 'about',
        ]);
    });

    $app->get('/projects', function (Request $request, Response $response) {
        $renderer = $this->get(PhpRenderer::class);
        return $renderer->render($response, 'pages/projects.php', [
            'pageTitle' => 'Work & Projects Showcase',
            'currentNav' => 'projects',
        ]);
    });

    $app->get('/journal', function (Request $request, Response $response) {
        $renderer = $this->get(PhpRenderer::class);
        return $renderer->render($response, 'pages/journal/index.php', [
            'pageTitle' => 'Journal & Everyday Life Blog',
            'currentNav' => 'journal',
        ]);
    });

    $app->get('/contact', function (Request $request, Response $response) {
        $renderer = $this->get(PhpRenderer::class);
        return $renderer->render($response, 'pages/contact.php', [
            'pageTitle' => 'Contact Information',
            'currentNav' => 'contact',
        ]);
    });

    // Health API Route
    $app->get('/api/health', function (Request $request, Response $response) {
        $payload = json_encode([
            'status' => 'ok',
            'appName' => $_ENV['APP_NAME'] ?? 'Portfolio',
            'timestamp' => date(DATE_ATOM),
        ]);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    });
};
