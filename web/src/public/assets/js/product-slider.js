document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.w-1\\/2.p-2.sm\\:w-1\\/4 a').forEach(function(item) {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            var mainImage = document.getElementById('mainImage');
            var newImageSrc = this.getAttribute('data-image-src');

            // Début de l'animation
            mainImage.style.opacity = '0';

            // Changement de l'image après une légère attente
            setTimeout(function() {
                mainImage.src = newImageSrc;
                mainImage.style.opacity = '1';
            }, 250); // La moitié de la durée de l'animation CSS pour un effet de fondu fluide

            // Gestion des bordures
            item.classList.add('border-green-400');
            item.classList.remove('border-gray-200');
            document.querySelectorAll('.w-1\\/2.p-2.sm\\:w-1\\/4 a').forEach(function(otherItem) {
                if (otherItem.getAttribute('data-image-src') !== newImageSrc) {
                    otherItem.classList.remove('border-green-400');
                    otherItem.classList.add('border-gray-200');
                }
            });
        });
    });
});