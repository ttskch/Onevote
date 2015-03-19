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

        $('button, input, select, textarea').blur();
        $('#spinner-modal').modal({
            backdrop: 'static',
            keyboard: false
        });

        var data = $(this).serializeJSON();
        $.ajax({
            type: 'POST',
            url: Routing.generate('api_v1_votee_app_post_board', {_format: 'json'}),
            dataType: 'json',
            data: data
        }).done(function (data) {
            location.href = Routing.generate('votee_app_board_index', { hash: data.hash });
        }).fail(function (xhr) {
            // todo.
        });
    });
});
