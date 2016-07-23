var app = angular.module("app", ['ui.router']);

app.value('BACKEND_API', 'api/');

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
        url: BACKEND_API + 'category',
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
            url: BACKEND_API + 'topic/store',
            method: 'POST'
        }).then(function successCallback(response) {
            alert("success");
            alert("res.data" + response.data);
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
            }
        }, function errorCallback() {
            alert("errorCallback");
        });
    };
}];

app.controller("AppCtrl", AppCtrl)
    .controller('CategoryDetailCtrl', CategoryDetailCtrl)
    .controller('AuthLoginCtrl', AuthLoginCtrl)
    .controller('TopicCreateCtrl', TopicCreateCtrl)
;
