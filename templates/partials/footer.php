<?php
/** @var string $appName */
/** @var string $appUrl */
$base = rtrim($appUrl ?? '', '/');
?>
<footer class="footer mt-6 py-6 has-background-dark has-text-light">
    <div class="content has-text-centered">
        <div class="mb-3">
            <a href="<?= $base ?>/">
                <img src="<?= $base ?>/assets/logo.png" alt="<?= htmlspecialchars($appName ?? 'Portfolio') ?> Logo" class="app-footer-logo">
            </a>
        </div>
        <p>
            <strong class="has-text-light"><?= htmlspecialchars($appName ?? 'Portfolio') ?></strong> — Built with 
            <a class="has-text-primary" href="https://bulma.io" target="_blank" rel="noopener">Bulma CSS</a>, 
            <a class="has-text-info" href="https://alpinejs.dev" target="_blank" rel="noopener">Alpine.js</a>, and 
            <a class="has-text-success" href="https://www.slimframework.com" target="_blank" rel="noopener">Slim 4</a>.
        </p>
        <p class="is-size-7 has-text-grey-light">
            &copy; <?= date('Y') ?> All rights reserved. Progressive Web App enabled.
        </p>
    </div>
</footer>
