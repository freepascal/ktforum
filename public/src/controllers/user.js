var UserCtrl = function($scope, $auth, $http, BACKEND_API) {
    $scope.isAuthenticated =function() {
        return $auth.isAuthenticated();
    }

    $scope.$watch(function($scope) {
        return $auth.isAuthenticated();
    }, function(val) {
        if (val == true) {
            $http({
                url: BACKEND_API + 'auth/me',
                method: 'POST'
            }).then(function(response) {
                $scope.me = response.data.user;
            });
        }
    });
};

angular.module("app").controller('UserCtrl', UserCtrl);
