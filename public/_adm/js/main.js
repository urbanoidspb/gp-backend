$(document).ready(function () {
    $('.tooltipped').tooltip();
});

/**
 * @param text HTML message text
 */
function message(text) {
    M.toast({html: text, classes: 'rounded'});
}