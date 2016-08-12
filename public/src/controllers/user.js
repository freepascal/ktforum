var UserCtrl = function($scope, $auth, $http, BACKEND_API) {
    var self = this;

    // check if user is logged in
    this.isAuthenticated =function() {
        return $auth.isAuthenticated();
    }

    // logged via Google, Facebook
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

    this.logout = function() {
        if (!$auth.isAuthenticated()) return;
        $auth
            .logout()
            .then(function() {
                toastr.info('You have been logged out');
            });
    }

    $scope.$watch(function($scope) {
        return $auth.isAuthenticated();
    }, function(val) {
        if (val == true) {
            $http({
                url: BACKEND_API + 'auth/me',
                method: 'POST'
            }).then(function(response) {
                self.me = response.data.user;
            });
        }
    });

    self.avatarUploader = {
        upload: function(elemId) {
            var f = angular.element(elemId).files[0];
            r = new FileReader();
            r.onloadend = function(e) {
                var data = e.target.result;
            };
        }
    };
};

angular.module("app").controller('UserCtrl', UserCtrl);
