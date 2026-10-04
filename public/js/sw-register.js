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

// PWA Install Prompt handling
let deferredPrompt = null;
const installBtn = document.getElementById('pwa-install-btn');

window.addEventListener('beforeinstallprompt', (e) => {
    // Prevent default mini-infobar on mobile
    e.preventDefault();
    deferredPrompt = e;
    
    // Show our custom install button in the navbar
    if (installBtn) {
        installBtn.style.display = 'inline-flex';
    }
});

if (installBtn) {
    installBtn.addEventListener('click', async () => {
        if (!deferredPrompt) return;
        
        deferredPrompt.prompt();
        const { outcome } = await deferredPrompt.userChoice;
        console.log(`User response to install prompt: ${outcome}`);
        
        deferredPrompt = null;
        installBtn.style.display = 'none';
    });
}

window.addEventListener('appinstalled', () => {
    console.log('Portfolio PWA was successfully installed.');
    if (installBtn) {
        installBtn.style.display = 'none';
    }
});
