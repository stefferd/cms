/**
 * Gemaakt door van den Berg Multimedia
 * User: Stef van den Bergt
 * Date: 10-04-12
 * Time: 14:38
 */
var Default = {
    init: function() {
        Default.initEditor();
    },
    imagePreview: function(input, target) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) { $(target).attr('src', e.target.result); }
            reader.readAsDataURL(input.files[0]);
        }
    },
    initEditor: function() {
        tinyMCE.init({
            // Location of TinyMCE script
            mode: 'exact',
            elements: 'text',
            script_url : 'http://www.mmcms.net/1.1/shared/editor/jscripts/tiny_mce/tiny_mce.js',
            document_base_url : "http://",
            remove_script_host: false,
            relative_urls : true,
            language : "nl",
            // General options
            theme : "advanced",
            skin : "thebigreason",
            auto_focus : "newcontent",
            width: "940",
            height: "450",
            plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist,imagemanager",

            // Theme options
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,undo,redo, insertimage, code",
            theme_advanced_buttons2 : "",
            theme_advanced_buttons3 : "",
            theme_advanced_buttons4 : "",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,

            // Example content CSS (should be your site CSS)
            content_css : "http://www.svokorfbal.nl/theme/default/css/style.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            }
        });
    }
}

$(document).ready(function() {
    Default.init();
});


