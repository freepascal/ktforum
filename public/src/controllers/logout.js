var LogoutCtrl = function($auth) {
    this.logout = function() {
        if (!$auth.isAuthenticated()) return;
        $auth.logout()
            .then(function() {
                toastr.info('You have been logged out');
            }
        );
    }
};

angular.module("app").controller("LogoutCtrl", LogoutCtrl);
