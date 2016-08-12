<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="/">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- grids, button, input, table, list, pagination -->
    <!--
    <link rel="stylesheet" href="dist/css/simplecss.min.css">
    -->

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        .container-layout {
            padding-top: 80px;
        }
        body {
            font-family: Verdana;
        }
    </style>
</head>
<body>
    <div ui-view></div>

    <!-- vendor -->
    <script src="dist/js/lib.js"></script>
    <script src="vendor/underscore.js"></script>

    <script src="src/app.js"></script>
    <script src="src/controllers/app.js"></script>
    <script src="src/controllers/appcategory.js"></script>
    <script src="src/controllers/apptopic.js"></script>
    <script src="src/controllers/register.js"></script>
    <script src="src/controllers/user.js"></script>
    <script src="src/controllers/header.js"></script>

    <script src="src/services/user.js"></script>
    <script src="src/filters/reverse.js"></script>
    <script src="src/filters/range.js"></script>
</body>
</html>
