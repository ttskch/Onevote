'use strict';

$(function () {

    $('#board-form').on('submit', function (e) {
        e.preventDefault();

        $('button, input, select, textarea').blur();
        $('#spinner-modal').modal({
            backdrop: 'static',
            keyboard: false
        });

        var data = $(this).serializeJSON();
        $.ajax({
            type: 'POST',
            url: Routing.generate('api_v1_votee_app_post_board', { _format: 'json', _locale: $('html').attr('lang') }),
            dataType: 'json',
            data: data
        }).done(function (data) {
            location.href = Routing.generate('votee_app_board_show', { hash: data.hash, _locale: $('html').attr('lang') });
        }).fail(function (xhr) {
            $('#spinner-modal').modal('hide');
            // todo.
        });
    });
});
