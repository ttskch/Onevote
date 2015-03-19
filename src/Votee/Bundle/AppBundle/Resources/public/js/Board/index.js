'use strict';

$(function () {

    $('.btn-plus-one').on('click', function () {
        $('.btn-plus-one').removeClass('active');
        $(this).addClass('active');
        $('[name="choice"]').val($(this).data('choice'));
    });

    $('#submit-vote-form').on('submit', function (e) {
        e.preventDefault();

        $('button, input, select, textarea').blur();
        $('#spinner-modal').modal({
            backdrop: 'static',
            keyboard: false
        });

        var data = $(this).serializeJSON();
        $.ajax({
            type: 'POST',
            url: Routing.generate('api_v1_votee_app_post_vote', { _format: 'json' }),
            dataType: 'json',
            data: data
        }).done(function (data) {
            location.href = Routing.generate('votee_app_board_votes', { hash: data.choice.board.hash });
        }).fail(function (xhr) {
            // todo.
        });
    });
});
