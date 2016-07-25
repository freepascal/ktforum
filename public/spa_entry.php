<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="/">
    <link rel="stylesheet" href="css/app.css">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="js/lib.js"></script>
    <script src="js/app.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <div ui-view></div>
    <div class="container" ng-controller="DebugInfoCtrl as d">
        <div class="row">
            <div class="col-s8 offset-s2">
                <ul class="collection">
                    <li class="collection-item brown">
                        Token status: {{ d.debug_info.token_status }}
                    </li>
                    <li class="collection-item yellow"><a ui-sref="app">Go to Home</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
