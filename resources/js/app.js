import './bootstrap';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.ckeditor').forEach((editorElement) => {
        ClassicEditor
            .create(editorElement)
            .catch(error => {
                console.error(error);
            });
    });
});


