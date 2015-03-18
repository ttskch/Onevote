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

    $('#create-board-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serializeJSON();
        $.ajax({
            type: 'POST',
            async: true,
            url: Routing.generate('api_v1_votee_app_post_board', { _format: 'json' }),
            data: data,
            dataType: 'json',
            success: function (data) {
                location.href = Routing.generate('votee_app_default_board', { hash: data.hash });
            }
        });
    });
});
