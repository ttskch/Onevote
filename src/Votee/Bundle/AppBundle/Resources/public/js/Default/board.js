'use strict';

$(function () {

    $('.btn-plus-one').on('click', function () {
        $('.btn-plus-one').removeClass('active');
        $(this).addClass('active');
        $('[name="choice"]').val($(this).data('choice'));
    });

    $('#submit-vote-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serializeJSON();
        $.ajax({
            type: 'POST',
            async: true,
            url: Routing.generate('api_v1_votee_app_post_vote', { _format: 'json' }),
            data: data,
            dataType: 'json',
            success: function (data) {
                location.href = Routing.generate('votee_app_default_board_votes', { hash: data.choice.board.hash });
            }
        });
    });
});
