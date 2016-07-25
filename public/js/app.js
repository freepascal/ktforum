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
            controller: 'CategoryDetailCtrl',
            templateUrl: '/partials/category/detail.html'
        })
        .state('topic_create', {
            url: '/create',
            controller: 'TopicCreateCtrl',
            templateUrl: '/partials/topic/create.html'
        });

    $locationProvider.html5Mode(true);
}]);

var AppCtrl = ['$http', 'BACKEND_API', '$scope', function($http, BACKEND_API, $scope) {
    // initialize
    var self = this;
    self.categories = [];
    $http({
        url: BACKEND_API + 'category/subcategories',
        method: 'GET'
    }).then(function(response) {
        self.categories = response.data.categories;
        console.log("categories:" + JSON.stringify(response.data.categories));
    });
}];

var CategoryDetailCtrl = ['$stateParams', function($stateParams) {
    this.topics = [
        {
            id: 1,
            title: 'You Mercury in Leo',
            body: 'Sao Thủy Sư Tử sinh ra để sáng tạo',
            is_sticked: true,
            is_locked: true
        },
        {
            id: 2,
            title: 'Tôi phải làm sao để quên đi người ta?',
            body: 'Hỏi chúa để biết chi tiết',
            is_sticked: false,
            is_locked: false
        }
    ];
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
var DebugInfoCtrl = ['$http', '$window', 'BACKEND_API', function($http, $window, BACKEND_API) {
    var self = this;
    self.debug_info = {
        token_status: false
    };
    $http({
        url: BACKEND_API + 'auth/validate_token',
        method: 'GET'
    }).then(function(response) {
        self.debug_info.token_status = response.data.token_status;
    });
    var decoded = jwt_decode($window.localStorage.getItem('token'));
    console.log('decoded:' + angular.toJson(decoded));
}];

app.controller("AppCtrl", AppCtrl)
    .controller('CategoryDetailCtrl', CategoryDetailCtrl)

    // AUTHENTICATION
    .controller('AuthLoginCtrl', AuthLoginCtrl)
    .controller('ValidateTokenCtrl', ValidateTokenCtrl)

    .controller('TopicCreateCtrl', TopicCreateCtrl)
    .controller('DebugInfoCtrl', DebugInfoCtrl)
;
