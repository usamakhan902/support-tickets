FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageExifOrientation,
    FilePondPluginFileValidateSize,
    // FilePondPluginImageEdit
);

// Select the file input and use
// create() to turn it into a pond
var ecommerce = FilePond.create(document.querySelector('.file-upload-multiple'), {
    storeAsFile: true
});
CKEDITOR.replace('description', {
    removeButtons: 'Image', // Remove the 'Image' button
    removePlugins: 'image' // Remove the 'Image' plugin
});

