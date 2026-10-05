<?php
/** @var string|null $currentNav */
/** @var string $appName */
/** @var string $appUrl */
$base = rtrim($appUrl ?? '', '/');
?>
<nav class="navbar is-dark is-fixed-top has-shadow" role="navigation" aria-label="main navigation" x-data="{ isMobileNavOpen: false }">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item navbar-brand-logo is-flex is-align-items-center has-text-weight-bold is-size-5" href="<?= $base ?>/" @click="isMobileNavOpen = false">
                <img src="<?= $base ?>/assets/logo.png" alt="imsamaritan" class="app-navbar-logo mr-2">
                <span>imsamaritan</span>
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" 
               :class="{ 'is-active': isMobileNavOpen }" 
               @click="isMobileNavOpen = !isMobileNavOpen">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu" :class="{ 'is-active': isMobileNavOpen }">
            <div class="navbar-start" @click="if ($event.target.closest('a')) isMobileNavOpen = false">
                <a class="navbar-item <?= ($currentNav ?? '') === 'home' ? 'is-active' : '' ?>" href="<?= $base ?>/" @click="isMobileNavOpen = false">Home</a>
                <a class="navbar-item <?= ($currentNav ?? '') === 'about' ? 'is-active' : '' ?>" href="<?= $base ?>/about" @click="isMobileNavOpen = false">About Me</a>
                <a class="navbar-item <?= ($currentNav ?? '') === 'projects' ? 'is-active' : '' ?>" href="<?= $base ?>/projects" @click="isMobileNavOpen = false">Projects</a>
                <a class="navbar-item <?= ($currentNav ?? '') === 'journal' ? 'is-active' : '' ?>" href="<?= $base ?>/journal" @click="isMobileNavOpen = false">Journal</a>
                <a class="navbar-item <?= ($currentNav ?? '') === 'contact' ? 'is-active' : '' ?>" href="<?= $base ?>/contact" @click="isMobileNavOpen = false">Contact</a>
            </div>

            <div class="navbar-end" id="pwa-install-container" style="display: none;">
                <div class="navbar-item">
                    <button id="pwa-install-btn" class="button is-primary is-small" type="button">
                        <span class="mr-1">📱</span>
                        <span>Install App</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
