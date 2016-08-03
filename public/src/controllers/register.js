var RegisterCtrl = ['$http', '$auth', 'BACKEND_API', function($http, $auth, BACKEND_API) {
    var self = this;
    /*
    self.register = function() {
        $http({
            url: BACKEND_API + 'auth/register',
            method: 'POST',
            data: {
                email: self.email,
                password: self.password
            }
        }).then(function successCallback(response) {
            if (response.data.token) {
                toastr.info("Register successfully");
            }
        }, function errorCallback(response) {
            for(var key in response.data.message) {
                for(i = 0; i < response.data.message[key].length; ++i) {
                    toastr.warning(response.data.message[key][i]);
                }
            }
        });
    };
    */
}];

angular.module("app").controller("RegisterCtrl", RegisterCtrl);
