// Register Service Worker
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('./sw.js')
            .then((registration) => {
                console.log('PWA ServiceWorker registered with scope:', registration.scope);
            })
            .catch((error) => {
                console.warn('PWA ServiceWorker registration failed:', error);
            });
    });
}

// ----------------------------------------------------
// PWA Installation & Navigation Space Cleanup
// ----------------------------------------------------
let deferredPrompt = null;
const installContainer = document.getElementById('pwa-install-container');
const installBtn = document.getElementById('pwa-install-btn');

function isPwaInstalled() {
    return window.matchMedia('(display-mode: standalone)').matches ||
           window.navigator.standalone === true ||
           localStorage.getItem('pwa_installed') === 'true';
}

function removeInstallButton() {
    if (installContainer) {
        installContainer.remove();
    }
    document.documentElement.classList.add('is-pwa-installed');
}

// 1. If already installed on load, cleanly remove install button and container immediately
if (isPwaInstalled()) {
    removeInstallButton();
}

// 2. Listen for installation eligibility (Chrome, Edge, Android)
window.addEventListener('beforeinstallprompt', (e) => {
    if (isPwaInstalled()) {
        removeInstallButton();
        return;
    }

    // Prevent default browser prompt
    e.preventDefault();
    deferredPrompt = e;

    // Reveal install container seamlessly in navbar
    if (installContainer) {
        installContainer.style.display = 'flex';
    }
});

// 3. User clicks Install App button
if (installBtn) {
    installBtn.addEventListener('click', async () => {
        if (!deferredPrompt) return;

        deferredPrompt.prompt();
        const { outcome } = await deferredPrompt.userChoice;
        deferredPrompt = null;

        if (outcome === 'accepted') {
            localStorage.setItem('pwa_installed', 'true');
            removeInstallButton();
        } else {
            // If user dismissed, hide container for current session
            if (installContainer) {
                installContainer.style.display = 'none';
            }
        }
    });
}

// 4. Listen for successful PWA installation event
window.addEventListener('appinstalled', () => {
    console.log('Portfolio PWA was successfully installed.');
    localStorage.setItem('pwa_installed', 'true');
    removeInstallButton();
});
