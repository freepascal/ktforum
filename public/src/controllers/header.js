var HeaderCtrl = function($http, BACKEND_API) {
    var self = this;
    $http({
        url: BACKEND_API + 'auth/header',
        method: 'GET'
    }).then(function(response) {
        self.header = response.data.header;
        self.authorization = response.data.authorization;
    });
};

angular.module("app").controller("HeaderCtrl", HeaderCtrl);
