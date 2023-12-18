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

    console.log(document.getElementById('headerCategories').querySelectorAll('a'));
    console.log(document.getElementById('headerSubcategory').querySelectorAll('a'));
    
    document.getElementById('headerCategories').querySelectorAll('a').forEach(function(category) {
        category.addEventListener('mouseenter', function(event) {
            event.preventDefault();
            // On récupère le "data-category" de l'élément survolé
            var categorySlug = this.getAttribute('data-category');
            console.log(categorySlug);

            document.getElementById('headerSubcategory').querySelectorAll('a').forEach(function(subcategory) {
                // On récupère le "data-subcategory" de l'élément survolé
                var subcatSlug = subcategory.getAttribute('data-subcategory');
                if(subcatSlug != categorySlug){
                    subcategory.classList.add('hidden');
                }
                console.log(document.getElementById('headerSubcategory').parentElement.querySelectorAll('.space-y-4'));
                document.getElementById('headerSubcategory').parentElement.querySelectorAll('.space-y-4').forEach(function(div){ div.classList.add('hidden')});
                document.getElementById('headerSubcategory').classList.remove('hidden');

                subcategory.addEventListener('mouseenter', function(event) {
                    event.preventDefault();
                    // On récupère le "data-category" de l'élément survolé
                    console.log(subcatSlug);
                });
            });
        });

        category.addEventListener('mouseleave', function(event) {
            event.preventDefault();
            
            document.getElementById('headerSubcategory').classList.add('hidden');

            document.getElementById('headerSubcategory').querySelectorAll('a').forEach(function(subcategory) {
                subcategory.classList.remove('hidden');
            });

            document.getElementById('headerSubcategory').parentElement.querySelectorAll('.space-y-4').forEach(function(div){ div.classList.remove('hidden')});
            document.getElementById('headerSubcategory').classList.add('hidden');

            currentHoveringCategory = false;
        });

        document.getElementById('headerSubcategory').querySelectorAll('a').forEach(function(subcategory) {
            subcategory.addEventListener('mouseenter', function(event) {
                event.preventDefault();
                // On récupère le "data-category" de l'élément survolé
                var subcatSlug = subcategory.getAttribute('data-subcategory');
                console.log(subcatSlug);
            });
        });
    });

});
