angular.module('app')
.service('UserService', function($http, BACKEND_API) {
    var user = {};
    var getAuthenticatedUser = function() {
        $http({
            url: BACKEND_API + 'auth/us',
            method: 'GET'
        }).then(function(response) {
            user = response.data.user;
        })
    };
});
