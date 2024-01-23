document.addEventListener('DOMContentLoaded', function() {
    // if the currant page is "admin-products?page=edit&slug=..." then we want to display the "edit" tab
    const urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('page');

    if (tab === 'edit') {
        const imagesUpload = document.getElementById('images-upload');

        function updateInputVisibility() {
            const photoCount = document.querySelectorAll('.flex.gap-3.items-center .relative').length;
            document.getElementById('small-file-input').style.display = photoCount >= 6 ? 'none' : 'block';
        }

        document.getElementById('small-file-input').addEventListener('change', function(event) {
            if (event.target.files.length > 0) {
                const file = event.target.files[0];

                // Ajouter le fichier au champ d'upload d'images
                let dataTransfer = new DataTransfer();
                for (let file of imagesUpload.files) {
                    dataTransfer.items.add(file);
                }
                dataTransfer.items.add(file);
                imagesUpload.files = dataTransfer.files;

                const reader = new FileReader();

                reader.onload = function(e) {
                    const newDiv = document.createElement('div');
                    newDiv.className = "relative";
                    newDiv.innerHTML = `
                        <label class="block text-sm font-medium text-gray-700">Photo</label>
                        <input type="text" class="max-w-xs mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="${file.name}">
                        <span class="delete-photo absolute top-0 right-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium bg-red-500 text-white cursor-pointer">X</span>
                        <img src="${e.target.result}" alt="Photo Preview" class="mt-2 rounded-md max-w-xs max-h-32">`;

                    document.querySelector('.flex.gap-3.items-center').insertBefore(newDiv, event.target.parentElement);
                    updateInputVisibility();
                };

                reader.readAsDataURL(file);
            }
        });

        document.querySelector('.flex.gap-3.items-center').addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-photo')) {
                event.target.parentElement.remove();
                updateInputVisibility();
            }
        });

        updateInputVisibility();


        // ajax
        document.getElementById('submitForm').addEventListener('click', function(e) {
            e.preventDefault();
            
            // Récupérer les données du formulaire
            const form = document.getElementById('editProductForm');
            const formData = new FormData(form);
            
            // Ajouter les images téléchargées à formData
            const imageInputs = document.getElementById('small-file-input').files;
            for (let i = 0; i < imageInputs.length; i++) {
                formData.append('new_images[]', imageInputs[i]);
            }
        
            // Récupérer le slug du produit dans l'URL (si nécessaire)
            const urlParams = new URLSearchParams(window.location.search);
            const slug = urlParams.get('slug');
        
            fetch('/edit-product/' + slug, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Affiche la réponse du serveur
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
        });
               
    }

    // actualize the adress field with the selected adress
    const addressInput = document.getElementById('location_address').querySelector('input');
    const adressSelect = document.getElementById('location_select');

    adressSelect.addEventListener('change', function() {
        this.querySelectorAll('option').forEach(function(option) {
            if (option.selected) {
                addressInput.value = option.getAttribute('data-place') + ',' + option.getAttribute('data-address');
            }
        });
    });

    // trigger the change one time
    adressSelect.dispatchEvent(new Event('change'));
});
