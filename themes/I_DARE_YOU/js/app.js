const APP = (function () {
    function init() {
        fetch(AJAX_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'get_venues', id: 32
            })
        })
            .then((response) => response.json())
            .then(data => console.log(data))
            .catch((error) => {
                console.log(error)
            })
    }

    return {
        init() {
            return init();
        }
    }
})();
APP.init();