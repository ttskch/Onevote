'use strict';

$(function () {

    $('.btn-add').on('click', function () {
        var $instance = $($($(this).data('prototype')).text());
        $instance.insertBefore(this);
        $instance.find('input, select, textarea').focus();
    });

    $(document).on('click', '.btn-remove', function () {
        $(this).closest('.input-group').remove();
    });
});
