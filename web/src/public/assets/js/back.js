document.addEventListener('DOMContentLoaded', function() {
    function updatePreview(inputElement, previewId) {
        var url = inputElement.value;
        var preview = document.getElementById(previewId);
        if (url) {
            preview.src = url;
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    }

    function updateInputVisibility() {
        const photoCount = document.querySelectorAll('.flex.gap-3.items-center .relative').length;
        const fileInputContainer = document.getElementById('file-input-container');
        fileInputContainer.style.display = photoCount >= 6 ? 'none' : 'block';
    }
    
    
    document.getElementById('small-file-input').addEventListener('change', function(event) {
        if (event.target.files.length > 0) {
            const file = event.target.files[0];
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
            event.target.value = ''; 
        }
    });
    
    document.querySelector('.flex.gap-3.items-center').addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-photo')) {
            event.target.parentElement.remove();
            updateInputVisibility();
        }
    });
    
    updateInputVisibility();
    
});