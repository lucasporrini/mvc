window.addEventListener('DOMContentLoaded', () => {
    // Si la taille d'écran est supérieur à 640px
    if (window.innerWidth > 640) {
        const dropdownToggles = document.querySelectorAll('.hs-dropdown button');
        let timeoutId;

        dropdownToggles.forEach(toggle => {
            const dropdownMenu = toggle.nextElementSibling;

            toggle.addEventListener('mouseenter', () => {
                clearTimeout(timeoutId);
                dropdownMenu.classList.remove('hidden', 'opacity-0');
                dropdownMenu.classList.add('absolute');
                toggle.querySelector('svg').classList.add('rotate-180');
            });

            toggle.addEventListener('mouseleave', () => {
                timeoutId = setTimeout(() => {
                    dropdownMenu.classList.add('hidden', 'opacity-0');
                    dropdownMenu.classList.remove('absolute');
                    toggle.querySelector('svg').classList.remove('rotate-180');
                }, 300); // Retarde la fermeture du menu
            });

            dropdownMenu.addEventListener('mouseenter', () => {
                clearTimeout(timeoutId); // Annule la fermeture du menu
            });

            dropdownMenu.addEventListener('mouseleave', () => {
                dropdownMenu.classList.add('hidden', 'opacity-0');
                dropdownMenu.classList.remove('absolute');
                toggle.querySelector('svg').classList.remove('rotate-180');
            });
        });
    } else {
        const hamburgerButton = document.querySelector('.hs-collapse-toggle');
        const navbarCollapse = document.getElementById('navbar-collapse-with-animation');

        navbarCollapse.classList.add('opacity-0');

        hamburgerButton.addEventListener('click', () => {
            if (navbarCollapse.classList.contains('hidden')) {
                navbarCollapse.classList.remove('hidden');
                setTimeout(() => {
                    navbarCollapse.classList.remove('opacity-0');
                }, 100); // Un léger délai avant de commencer la transition
            } else {
                navbarCollapse.classList.add('opacity-0');
                setTimeout(() => {
                    navbarCollapse.classList.add('hidden');
                }, 200); // La durée doit correspondre à celle de votre transition
            }
        });

        const dropdownToggles = document.querySelectorAll('.hs-dropdown button');

        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', (event) => {
                event.preventDefault();

                const dropdownMenu = toggle.nextElementSibling;
                if (dropdownMenu.classList.contains('hidden')) {
                    dropdownMenu.classList.remove('hidden');
                    setTimeout(() => {
                        dropdownMenu.classList.remove('opacity-0');
                    }, 10);
                } else {
                    dropdownMenu.classList.add('opacity-0');
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    }
});
