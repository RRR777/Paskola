<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Paskola</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #444444;
                font-weight: 100;
                height: 100vh;
            }

            .title {
                font-size: 60px;
            }

            .card {
                margin: 100px;
                width: 80%;
            }

            a {
                color: #fff;
            }

            .btn {
                float: right;
                margin: 10px;
            }

        </style>
    </head>
    <body>
        @yield('content')
    </body>
</html>







