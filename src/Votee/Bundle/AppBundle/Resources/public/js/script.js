$(function () {
    $('#create-board-form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            async: true,
            url: Routing.generate('api_v1_votee_app_post_board', { _format: 'json' }),
            data: {
                name: 'test',
                choices: [
                    { name: 'choice1' },
                    { name: 'choice2' }
                ]
            },
            dataType: 'json',
            success: function (data) {
                //location.href = Routing.generate('votee_app_board', { hash: data.hash });
                location.href = Routing.generate('home');
            }
        });
    });
});
