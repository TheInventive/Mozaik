$('body').on('click', '[data-editable]', function(){

    const $el = $(this);

    const $input = $('<input/>').val($el.text());
    $el.replaceWith( $input );

    const save = function () {
        const $p = $('<p data-editable />').text($input.val());
        $input.replaceWith($p);
    };
    $input.one('blur', save).focus();

});