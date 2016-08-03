var UserCtrl = function($http, $auth, BACKEND_API) {
    var self = this;
    self.isAuthenticated = function() {
        return $auth.isAuthenticated();
    };
    $http({
        url: BACKEND_API + 'auth/me',
        method: 'GET'
    }).then(function successCallback(response) {
        self.me = response.data.user;
    }, function errorCallback(response) {

    });
};

angular.module("app").controller('UserCtrl', UserCtrl);
