<!DOCTYPE html>
<html lang="en" data-theme="light" class="has-navbar-fixed-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#004aad">
    <title><?= htmlspecialchars($pageTitle ?? 'Portfolio') ?> | <?= htmlspecialchars($appName ?? 'Portfolio') ?></title>
    
    <!-- Anti-FOUC Early Theme Initializer -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme ? savedTheme : (prefersDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>

    <!-- Favicon & Touch Icons (Using User Logo) -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= rtrim($appUrl ?? '', '/') ?>/icons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= rtrim($appUrl ?? '', '/') ?>/icons/favicon-16.png">
    <link rel="icon" type="image/png" href="<?= rtrim($appUrl ?? '', '/') ?>/assets/logo.png">
    <link rel="shortcut icon" href="<?= rtrim($appUrl ?? '', '/') ?>/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= rtrim($appUrl ?? '', '/') ?>/icons/apple-touch-icon.png">
    
    <!-- PWA Web App Manifest -->
    <link rel="manifest" href="<?= rtrim($appUrl ?? '', '/') ?>/manifest.json">
    
    <!-- Bulma CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">

    <!-- Boxicons (Lightweight Font Icons) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css">
    
    <!-- Alpine.js Theme Store Initializer -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('theme', {
                current: document.documentElement.getAttribute('data-theme') || 'light',
                get isDark() {
                    return this.current === 'dark';
                },
                toggle() {
                    this.current = this.current === 'dark' ? 'light' : 'dark';
                    document.documentElement.setAttribute('data-theme', this.current);
                    localStorage.setItem('theme', this.current);
                }
            });
        });
    </script>
    
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= rtrim($appUrl ?? '', '/') ?>/css/custom.css">
</head>
<body>
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
