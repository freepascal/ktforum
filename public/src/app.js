var app = angular.module("app", [
    'ui.router',
    'satellizer',
    'bootstrap.fileField'
]);

app.value('BACKEND_API', 'api/');

/*
angular.module('app').run(function($http, $window) {
  $http.defaults.headers.common.Authorization = 'Authorization: Bearer ' + $window.localStorage.getItem("satellizer_token");;
});

app.config(['$httpProvider', function($httpProvider) {
    $httpProvider.interceptors.push(function($window) {
        return {
            'request': function(config) {
                config.headers['Authorization'] = 'bearer ' + $window.localStorage.getItem("satellizer_token");
                return config;
            }
        };
    });
}]);
*/

app.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', '$authProvider',
    function($stateProvider, $urlRouterProvider, $locationProvider, $authProvider) {

    $urlRouterProvider.otherwise('404');
    $stateProvider
        .state('404', {
            url: '/404',
            templateUrl: '/partials/404.html'
        })
        .state('login', {
            url: '/login',
            templateUrl: '/partials/auth/login.html'
        })
        .state('app', {
            url: '/',
            controller: 'AppCtrl as app',
            templateUrl: '/partials/app.html'
        })
        .state('category', {
            url: '/c/:slug',
            controller: 'AppCategoryCtrl as appcategory',
            templateUrl: '/partials/appcategory.html'
        })
        .state('topic', {
            url: '/t/:slug',
            controller: 'AppTopicCtrl as apptopic',
            templateUrl: '/partials/apptopic.html'
        })
        .state('ucp', {
            url: '/ucp',
            controller: 'UCPCtrl as ucp',
            templateUrl: '/partials/ucp.html',
            resolve: {
                loginRequired: requireLogin
            }
        })
        .state('topic_create', {
            url: '/create',
            controller: 'TopicCreateCtrl',
            templateUrl: '/partials/topic/create.html',
            resolve: {
                loginRequired: requireLogin
            }
        })
        .state('header', {
            url: '/header',
            controller: 'HeaderCtrl as header',
            templateUrl: '/partials/test/header.html'
        });

    $locationProvider.html5Mode(true);

    function requireLogin($auth, $q, $state, $location) {
        var deferred = $q.defer();
        if ($auth.isAuthenticated()) {
            deferred.resolve();
        } else {
            $location.path('/login');
        }
        return deferred.promise;
    };

    //function loginRequired($auth, $q, $state, $location)
    $authProvider.loginUrl = 'api/auth/login';
    $authProvider.signupUrl = 'api/auth/signup';
    //$authProvider.tokenPrefix = null;

    $authProvider.google({
        clientId: '1079230626392-gn6agq7cjfamdr8d9ur7o0i7gmb8mdpr.apps.googleusercontent.com'
        //  JSLFgr_OQiUlws3jgwUdgwJy
    });
}]);

var TopicCreateCtrl = ['$http', '$stateParams', 'BACKEND_API', function($http, $stateParams, BACKEND_API) {
    var self = this;
    self.categories = [];
    self.create = function() {
        $http({
            url: BACKEND_API + 'topic',
            method: 'POST',
            data: {
                category_id: self.category_id,
                title: self.title,
                body: self.body
            }
        }).then(function successCallback(response) {
            alert("success");
            alert("res.data" + JSON.stringify(response.data));
        }, function errorCallback(response) {

        });
    };
    $http({
        url: BACKEND_API + 'category',
        method: 'GET'
    }).then(function successCallback(response) {
        self.categories = response.data.categories;
    }, function errorCallback(response) {

    });
}];

var TopicDetailCtrl = ['$stateParams', function($stateParams) {
    this.topic = {
        id: 1,
        title: 'Topic thu nhat',
        body: 'By default Blade engine looks for .blade.php files, and then falls back to .php files. We can do what we want by telling Laravel ',
        category_id: 1,
        user_id: 1
    };
}];




var AuthGoogleCtrl = ['$stateParams', function($stateParams) {
    var self = this;
    alert($stateParams.code);
}];

var ValidateTokenCtrl = ['$http', '$window', 'BACKEND_API', function($http, $window, BACKEND_API) {
    var self = this;
    self.token_status = "invalid";

    self.assign_token = function() {
        $window.localStorage.setItem('token', self.token_new);
        console.log("set new token: " + $window.localStorage.getItem("token"));
    };

    $http({
        url: BACKEND_API + 'auth/validate_token',
        method: 'GET'
    }).then(function(response) {
        self.token_status = response.data.token_status;
    }, function(response) {
        self.token_status = "co loi xay ra cmnr khi $http.get()!";
    });
}];

// DEBUG

app
    //.controller('AuthCtrl', AuthCtrl)
    .controller('AuthGoogleCtrl', AuthGoogleCtrl)
    .controller('ValidateTokenCtrl', ValidateTokenCtrl)
    .controller('TopicCreateCtrl', TopicCreateCtrl)
;

app.directive('fileModel', ['$parse', function($parse) {
    return {
        restrict: 'A',
        link: function(scope, elem, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            elem.bind('change', function() {
                scope.$apply(function() {
                    modelSetter(scope, elem[0].files[0]);
                });
            });
        }
    };
}]);

alert('hellion');
