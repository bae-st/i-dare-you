let APP = {};
(function ($) {
    APP = {
        init() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                async: true,
                url: AJAX_URL,
                data: {
                    action: 'get_venues',
                    id: 32
                },
                success: (data) => {
                    console.log(data)
                },
                error: (error) => {
                    console.log(error)
                }
            })
        }
    }

    $(document).ready(function () {
        APP.init()
    })
})(jQuery)