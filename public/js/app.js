var app = angular.module("app", [
    'ui.router',
    'satellizer'
]);

app.value('BACKEND_API', 'api/');

app.config(['$httpProvider', function($httpProvider) {
    $httpProvider.interceptors.push(function($window) {
        return {
            'request': function(config) {
                config.headers['Authorization'] = 'bearer ' + $window.localStorage.getItem("token");
                return config;
            }
        };
    });
}]);

app.config(['$authProvider', function($authProvider) {
    $authProvider.google({
        clientId: '1079230626392-gn6agq7cjfamdr8d9ur7o0i7gmb8mdpr.apps.googleusercontent.com'
        //  JSLFgr_OQiUlws3jgwUdgwJy
    });
}]);

app.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function($stateProvider, $urlRouterProvider, $locationProvider) {

    $urlRouterProvider.otherwise('404');
    $stateProvider
        .state('404', {
            url: '/404',
            templateUrl: '/partials/404.html'
        })
        .state('login', {
            url: '/login',
            controller: 'LoginCtrl as login',
            templateUrl: '/partials/auth/login.html'
        })
        .state('auth_google_redirect', {
            url: '/auth/google',
            controller: 'AuthGoogleCtrl',
            templateUrl: '/partials/auth/google.html'
        })
        .state('validate_token', {
            url: '/validate_token',
            controller: 'ValidateTokenCtrl',
            templateUrl: '/partials/auth/validate_token.html'
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
        .state('topic_create', {
            url: '/create',
            controller: 'TopicCreateCtrl',
            templateUrl: '/partials/topic/create.html'
        });

    $locationProvider.html5Mode(true);
}]);

app.filter('reverse', function() {
    return function(items) {
        return items.slice().reverse();
    };
});





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

var AppNavbarCtrl = ['$http', '$window', 'BACKEND_API', 'UserService', '$rootScope', '$auth', function($http, $window, BACKEND_API, UserService, $rootScope, $auth) {
    var self = this;
    self.user = null;
    self.navitems = [
        "Angular",
        "React",
        "Knockout",
        "JQuery",
        "Django",
        "Laravel"
    ];
    self.isAuthenticated = function() {
        return $auth.isAuthenticated();
    };
    $http({
        url: BACKEND_API + 'auth/me',
        method: 'GET'
    }).then(function(res) {
        self.user = res.data.user;
    });
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
        self.token_status = response.data.token;
    }, function(response) {
    });
}];

// DEBUG

app
    .controller('AppNavbarCtrl', AppNavbarCtrl)
    //.controller('AuthCtrl', AuthCtrl)
    .controller('AuthGoogleCtrl', AuthGoogleCtrl)
    .controller('ValidateTokenCtrl', ValidateTokenCtrl)
    .controller('TopicCreateCtrl', TopicCreateCtrl)
;

app.factory("UserService", ['$http', 'BACKEND_API', function($http, BACKEND_API) {
    var factory = {};
    factory.getUser = function() {
        return $http({
            url: BACKEND_API + 'auth/me',
            method: 'GET'
        });
    };
    return factory;
}]);
