var LoginCtrl = function($auth) {
    var self = this;
    self.authenticate = function(provider) {
        $auth.authenticate(provider);
    };
    self.login = function() {
        $auth.login(self.user)
            .then(function successCallback(response) {
                console.log(response);
                $auth.setToken(response);
                angular.element('#m_login').modal('toggle'); // close modal login
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
