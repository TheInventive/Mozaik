$('body').on('click', '[data-editable]', function(){

    const $el = $(this);

    const $input = $('<input/>').val($el.text());
    $el.replaceWith( $input );

    const save = function () {
        const $p = $('<li data-editable />').text($input.val());
        console.log($input.val());
        $input.replaceWith($p);
    };
    $input.one('blur', save).focus();

});