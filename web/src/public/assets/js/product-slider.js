document.addEventListener('DOMContentLoaded', function() {
    console.log(document.querySelectorAll('.w-1\\/2.p-2.sm\\:w-1\\/4 a'));
    document.querySelectorAll('.w-1\\/2.p-2.sm\\:w-1\\/4 a').forEach(function(item) {
        item.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien
            var newImageSrc = this.getAttribute('data-image-src');
            document.getElementById('mainImage').src = newImageSrc;
            item.classList.add('border-green-400');
            item.classList.remove('border-gray-200');
            
            // On retire la classe border-green-400 et on ajoute la classe border-gray-200 à tous les autres éléments
            document.querySelectorAll('.w-1\\/2.p-2.sm\\:w-1\\/4 a').forEach(function(item) {
                if (item.getAttribute('data-image-src') !== newImageSrc) {
                    item.classList.remove('border-green-400');
                    item.classList.add('border-gray-200');
                }
            });
        });
    });
});