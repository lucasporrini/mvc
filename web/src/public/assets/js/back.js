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
});