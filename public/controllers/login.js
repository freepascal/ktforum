var LoginCtrl = ['$http', '$window', 'BACKEND_API', '$auth', function($http, $window, BACKEND_API, $auth) {
    alert("wwhy");
    var self = this;
    self.authenticate = function(provider) {
        $auth.authenticate(provider);
    }
    self.login = function() {
        alert("You login with email " + self.email);
        console.log('email: ' + self.email);
        console.log('passwd: ' + self.password);
        $http({
            url: BACKEND_API + 'auth/login',
            method: 'POST',
            data: {
                email: this.email,
                password: this.password
            }
        }).then(function(response) {
            if (response.data.token) {
                $window.localStorage.setItem('token', response.data.token);
                alert("Save token successfully");
                alert("token:" + response.data.token);
                console.log("token:"+response.data.token);
            }
        }, function errorCallback() {
            alert("errorCallback");
        });
    };
}];

angular.module("app").controller("LoginCtrl", LoginCtrl);
