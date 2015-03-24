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
            url: Routing.generate('api_v1_onevote_app_post_vote', { _format: 'json', _locale: $('html').attr('lang') }),
            dataType: 'json',
            data: data,
            context: this

        }).done(function (data) {
            location.href = Routing.generate('onevote_app_board_show_votes', { hash: data.choice.board.hash, _locale: $('html').attr('lang') });

        }).fail(function (xhr) {
            $('#spinner-modal').modal('hide');
            $(this).find('.alert').show();

            var errors = JSON.parse(xhr.responseText);
            var focused = false;
            for (var key in errors) {
                var $input = $(this).find('[name^="' + key + '"]');
                $input.closest('.form-group').addClass('has-error').tooltip({
                    title: errors[key]
                });
                if (!focused) {
                    $input.focus();
                    focused = true;
                }
            }
        });
    });
});
