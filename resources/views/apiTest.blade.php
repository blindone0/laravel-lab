<html>
    <body>
        <h1>Hello, {{ $name }}</h1>
        <h1>The current UNIX timestamp is {{ time() }}.</h1>

    </body>
    <script>
    function testPostRoute(id = '') {
        fetch(`/api/foo/${id}`, {
            method: 'POST',
            headers: {
            "Content-type": "application/json", // We are sending JSON data
            credentials: 'include'
            },
            body: JSON.stringify({ name: 'Eka', isHungry: true })
        })
            .then(function(response) {
            return response.json();
            })
            .then(function (payload) {
            console.log("API response", payload);
        })
    }

    $resp = testPostRoute('11');

    </script>
</html>