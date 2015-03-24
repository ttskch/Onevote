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
            type: 'PUT',
            url: Routing.generate('api_v1_onevote_app_put_board', { board: $(this).data('id'), _format: 'json', _locale: $('html').attr('lang') }),
            dataType: 'json',
            data: data,
            context: this

        }).done(function (data) {
            location.href = Routing.generate('onevote_app_board_show', { hash: data.hash, _locale: $('html').attr('lang') });

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
