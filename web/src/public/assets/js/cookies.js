window.addEventListener('DOMContentLoaded', () => {
    const cookieBanner = document.getElementById('cookies-simple-with-icon-and-dismiss-button');
    
    if (!cookieBanner) {
        return;
    }

    const cookieBannerButton = cookieBanner.querySelector('button');
    
    cookieBannerButton.addEventListener('click', () => {
        cookieBanner.classList.add('hidden');
        
        // Création d'un cookie qui expire dans 30 jours
        document.cookie = 'user_consent=true; max-age=' + 60 * 60 * 24 * 30;
    });

    const cookiePopUp = document.getElementById('cookie-consent-pop-up');

    cookieBanner.querySelector('a').addEventListener('click', (e) => {
        e.preventDefault();
        cookiePopUp.classList.remove('hidden');
        cookieBanner.classList.add('hidden');

        // Création d'un cookie qui expire dans 30 jours
        document.cookie = 'user_consent=true; max-age=' + 60 * 60 * 24 * 30;

        cookieButtons = cookiePopUp.querySelectorAll('button');
        
        cookieButtons[0].addEventListener('click', () => {
            cookiePopUp.classList.add('hidden');
            document.cookie = 'user_consent=true; max-age=-1';
        });

        cookieButtons[1].addEventListener('click', () => {
            cookiePopUp.classList.add('hidden');
        });

    });
});