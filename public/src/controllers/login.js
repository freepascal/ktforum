var LoginCtrl = function($http, $window, BACKEND_API, $auth, $state) {
    var self = this;
    self.user = { };
    self.authenticate = function(provider) {
        $auth.authenticate(provider);
    };
    self.login = function() {
        $auth
            .login(self.user)
            .then(function successCallback(response) {
                console.log(response);
                $auth.setToken(response);
                // close login modal
                angular.element('#m_login').modal('toggle');
                toastr.success('Login successfully');
            })
            .catch(function(response) {
                for(var key in response.data.error) {
                    if (_.isArray(response.data.error)) {
                        for(i = 0; i < response.data.error[key].length; ++i) {
                            toastr.warning(response.data.error[key][i]);
                        }
                    } else {
                        toastr.warning(response.data.error);
                    }
                }
            });
    }
};

angular.module("app").controller("LoginCtrl", LoginCtrl);
