<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#00d1b2">
    <title><?= htmlspecialchars($pageTitle ?? 'Portfolio') ?> | <?= htmlspecialchars($appName ?? 'Portfolio') ?></title>
    
    <!-- Favicon & Touch Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= rtrim($appUrl ?? '', '/') ?>/icons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= rtrim($appUrl ?? '', '/') ?>/icons/favicon-16.png">
    <link rel="shortcut icon" href="<?= rtrim($appUrl ?? '', '/') ?>/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= rtrim($appUrl ?? '', '/') ?>/icons/apple-touch-icon.png">
    
    <!-- PWA Web App Manifest -->
    <link rel="manifest" href="<?= rtrim($appUrl ?? '', '/') ?>/manifest.json">
    
    <!-- Bulma CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= rtrim($appUrl ?? '', '/') ?>/css/custom.css">
</head>
<body class="has-navbar-fixed-top-widescreen">
    <?= $this->fetch('partials/navbar.php', [
        'currentNav' => $currentNav ?? '',
        'appName' => $appName ?? '',
        'appUrl' => $appUrl ?? '',
    ]) ?>

    <main id="app-main">
        <?= $content ?>
    </main>

    <?= $this->fetch('partials/footer.php', [
        'appName' => $appName ?? '',
        'appUrl' => $appUrl ?? '',
    ]) ?>

    <!-- Service Worker Registration Script -->
    <script src="<?= rtrim($appUrl ?? '', '/') ?>/js/sw-register.js"></script>
</body>
</html>
