
jQuery(document).ready(function($){
$('#upload_image_button').click(function(e) {
    e.preventDefault();
    var image = wp.media({
        title: 'Upload Image',
        multiple: false
    }).open().on('select', function(){
        var uploaded_image = image.state().get('selection').first();
        var image_id = uploaded_image.toJSON().id;
        console.log(uploaded_image);
        $('#banner_image_id').val(image_id);
        $('.attachment-post-thumbnail').attr('src' ,uploaded_image.attributes.url );
    });
});
});
