require('./bootstrap');

require('alpinejs');
FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageExifOrientation,
    FilePondPluginFileValidateSize
);
console.log(FilePond)
const filepondElm = document.querySelector('.filepond')
console.log('this the url '+ filepondElm.dataset.url)
FilePond.setOptions({
    server: {
        url: 'http://localhost:8000',
        process: {
            url: `/${filepondElm.dataset.url}`,
            method: 'POST',
            headers: {
                'Access-Control-Allow-Origin':'http://localhost:8000/upload | *',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Methods':'POST'
            }
        }
    } });
