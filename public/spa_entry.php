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

    <!-- grids, button, input, table, list, pagination -->
    <link rel="stylesheet" href="css/simplecss.min.css">

    <script src="js/lib.js"></script>


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <div ui-view></div>
    <script src="js/app.js"></script>
    <script src="controllers/app.js"></script>
    <script src="controllers/appcategory.js"></script>
    <script src="controllers/apptopic.js"></script>    
    <script src="controllers/login.js"></script>
</body>
</html>
