var AppCtrl = ['$http', 'BACKEND_API', '$scope', '$auth', function($http, BACKEND_API, $scope, $auth) {
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

angular.module("app").controller("AppCtrl", AppCtrl);
