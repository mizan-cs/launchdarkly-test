<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>




    <script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/launchdarkly-js-client-sdk"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <style>
        .feature{
            background: gray;
            color: white;
            padding: 100px;
        }
        .feature-x {
            background: black;
            color: white;
            padding: 100px;
        }
    </style>
</head>
<body class="font-sans antialiased">

<div class="container">
    <div id="feature_name" class="feature">Showing Feature</div>
    <script>

        // A $( document ).ready() block.
        $( document ).ready(function() {

            var feature_name = document.getElementById('feature_name');
            feature_name.innerText = 'Feature Loading..'
            var user = {
                "key": "mizan@test.com"
            };
            var client = LDClient.initialize('61d2f2fd59d4b50dc54b51cd', user);

            client.on('ready', function() {
                console.log("It's now safe to request feature flags");
                var showFeature = client.variation("show-home-page", true);

                if(showFeature) {
                    feature_name.innerText = 'Feature X'
                    feature_name.setAttribute('class','feature-x')
                } else {
                    feature_name.innerText = 'Feature Y'
                    feature_name.setAttribute('class','feature')
                }

                client.on('change', function () {
                    var showFeature = client.variation("show-home-page", true);
                    if(showFeature) {
                        feature_name.innerText = 'Feature X'
                        feature_name.setAttribute('class','feature-x')
                    } else {
                        feature_name.innerText = 'Feature Y'
                        feature_name.setAttribute('class','feature')
                    }
                })
            });

        });

    </script>
</div>
</body>
</html>
