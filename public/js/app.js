var app = angular.module("app", ['ui.router']);

app.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function($stateProvider, $urlRouterProvider, $locationProvider) {

    $urlRouterProvider.otherwise('404');
    $stateProvider
        .state('404', {
            url: '/404',
            templateUrl: '/partials/404.html'
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
        });

    $locationProvider.html5Mode(true);
}]);

var AppCtrl = function() {
    this.categories = [
        {
            id: 1,
            title: 'Startup-Khởi Nghiệp!',
            description: 'Khoi nghiep lam giau nhe anh chi em oi'
        },
        {
            id: 2,
            title: 'Desktop Development',
            description: 'Trước đó, hình ảnh Hari Won xuất hiện tại sân bay với thân hình phát tướng đã gây xôn xao cộng đồng mạng. Tuy nhiên do diện đầm rộng nên phần bụng chưa được kiểm chứng rõ. Cô cũng né tránh các câu hỏi liên quan đến vấn đề mang thai với bạn trai.'
        },
        {
            id: 3,
            title: 'Math & Youth magazines',
            description: 'I wanna love you so much!'
        }
    ];
};

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

var topicDetailCtrl = ['$stateParams', function($stateParams) {
    this.topic = {
        id: 1,
        title: 'Topic thu nhat',
        body: 'By default Blade engine looks for .blade.php files, and then falls back to .php files. We can do what we want by telling Laravel ',
        category_id: 1,
        user_id: 1
    };
}];

app.controller("AppCtrl", AppCtrl)
    .controller('CategoryDetailCtrl', CategoryDetailCtrl)
    ;
