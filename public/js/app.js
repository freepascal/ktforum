var app = angular.module("app", ['ui.router']);

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

app.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function($stateProvider, $urlRouterProvider, $locationProvider) {

    $urlRouterProvider.otherwise('404');
    $stateProvider
        .state('404', {
            url: '/404',
            templateUrl: '/partials/404.html'
        })
        .state('login', {
            url: '/login',
            controller: 'AuthLoginCtrl',
            templateUrl: '/partials/auth/login.html'
        })
        .state('validate_token', {
            url: '/validate_token',
            controller: 'ValidateTokenCtrl',
            templateUrl: '/partials/auth/validate_token.html'
        })
        .state('app', {
            url: '/',
            controller: 'AppCtrl',
            templateUrl: '/partials/app.html'
        })
        .state('category', {
            url: '/c/:slug',
            controller: 'AppCategoryCtrl',
            templateUrl: '/partials/category/detail.html'
        })
        .state('topic', {
            url: '/t/:slug',
            controller: 'AppTopicCtrl',
            templateUrl: '/partials/topic/detail.html'
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

var AppCtrl = ['$http', 'BACKEND_API', '$scope', function($http, BACKEND_API, $scope) {
    // initialize
    var self = this;
    self.categories = [];
    $http({
        url: BACKEND_API + 'category',
        method: 'GET'
    }).then(function(res) {
        self.categories = res.data.categories;
    });
}];

var AppAuthCtrl = ['$http', 'BACKEND_API', function($http, BACKEND_API) {

}];

var AppCategoryCtrl = ['$stateParams', '$http', 'BACKEND_API', function($stateParams, $http, BACKEND_API) {
    var self = this;
    self.breadcrumb = [];
    self.category = {};
    self.display_subcategories = function() {
        return true;
    }

    // retrieve specified category and its topics
    $http({
        url: BACKEND_API + 'category/' + $stateParams.slug,
        method: 'GET'
    }).then(function(res) {
        self.category = res.data.category;
    });

    // retrieve forum location
    $http({
        url: BACKEND_API + 'category/' + $stateParams.slug + '/breadcrumb',
        method: 'GET'
    }).then(function(res) {
        function standardize(breadcrumb) {
            result = [], i = 0;
            for(key in breadcrumb) {
                if (i % 3 == 0) {
                    result.unshift({
                        title: breadcrumb[key]
                    });
                } else if (i % 3 == 1){
                    result[0]['slug'] = breadcrumb[key];
                } else {
                    result[0]['id'] = breadcrumb[key];
                }
                ++i;
            }
            return result;
        }
        self.breadcrumb = standardize(res.data.breadcrumb[0]);
        console.log("breadcrumb: " + JSON.stringify(self.breadcrumb));
    });
}];

var AppTopicCtrl = ['$http', '$stateParams', 'BACKEND_API', function($http, $stateParams, BACKEND_API) {
    var self = this;
    self.topic = {};
    $http({
        url: BACKEND_API + 'topic/' + $stateParams.slug,
        method: 'GET'
    }).then(function(res) {
        self.topic = res.data.topic;
    });
}];

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

var AppNavbarCtrl = ['$http', '$window', 'BACKEND_API', 'UserService', '$rootScope', function($http, $window, BACKEND_API, UserService, $rootScope) {
    var self = this;
    self.user = null;
    $http({
        url: BACKEND_API + 'auth/me',
        method: 'GET'
    }).then(function(res) {
        self.user = res.data.user;
    });
}];

// AUTHENTICATION
var AuthLoginCtrl = ['$http', '$window', 'BACKEND_API', function($http, $window, BACKEND_API) {
    this.login = function() {
        console.log('email: ' + this.email);
        console.log('passwd: ' + this.password);
        $http({
            url: BACKEND_API + 'auth/login',
            method: 'POST',
            data: {
                email: this.email,
                password: this.password
            }
        }).then(function(response) {
            if (response.data.token) {
                $window.localStorage.setItem('token', response.data.token);
                alert("Save token successfully");
                alert("token:" + response.data.token);
                console.log("token:"+response.data.token);
            }
        }, function errorCallback() {
            alert("errorCallback");
        });
    };
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

app.controller("AppCtrl", AppCtrl)
    .controller('AppAuthCtrl', AppAuthCtrl)
    .controller('AppNavbarCtrl', AppNavbarCtrl)
    .controller('AppCategoryCtrl', AppCategoryCtrl)

    // AUTHENTICATION
    .controller('AuthLoginCtrl', AuthLoginCtrl)
    .controller('ValidateTokenCtrl', ValidateTokenCtrl)

    .controller('AppTopicCtrl', AppTopicCtrl)
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
