$(document).ready(function () {
    $('.tooltipped').tooltip();
    tinymce.init({
        selector: "textarea",
        plugins: ['autoresize', 'autolink',
            'autosave', 'directionality', 'visualchars',
            'image', 'link', 'media', 'table', 'charmap', 'hr',
            'nonbreaking', 'anchor', 'toc', 'insertdatetime', 'advlist', 'lists', 'wordcount',
            'imagetools', 'textpattern', 'noneditable', 'help', 'quickbars', 'emoticons'
        ],
        menubar: false,
        toolbar: false,
        autosave_ask_before_unload: true,
        autosave_interval: "10s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        language: "ru",
        max_height: 500,
        language_url: '/_adm/js/tinymce_langs/ru.js',
        contextmenu: false,
        quickbars_selection_toolbar: 'bold italic strikethrough underline quicklink | h2 h3 blockquote',
        quickbars_insert_toolbar: 'quickimage quicktable media hr',
        // contextmenu: "link image imagetools media table spellchecker configurepermanentpen",
        contextmenu_never_use_native: true,
        content_css: ['/_adm/css/tinymce_editor.css']
    });
});

/**
 * @param text HTML message text
 */
function message(text) {
    M.toast({html: text, classes: 'rounded'});
}