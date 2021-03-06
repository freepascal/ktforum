var UCPCtrl = function($scope, $auth, $http, $location, BACKEND_API) {
    var self = this;
    self.user = {};

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
                angular.element('#m_login').modal('hide');
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
                $location.path('/');
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


    self.dotest = function() {
        var formDataById = new FormData(document.getElementById('form'));
        var formDataByName = new FormData(document.getElementsByName('form')[0]);

        console.log('formDataById: ', angular.toJson(formDataById));
        console.log('formDataByName: ', angular.toJson(formDataByName));

    };
};

angular.module("app").controller('UCPCtrl', UCPCtrl);
