angular
    .module('app')
    .factory('httppost', function($http) {
        return function(url, data, callback) {
            $http({
                url: url,
                method: 'POST',
                data: data,
                headers: {
                    'Content-Type': undefined
                }
            }).success(function(response) {
                callback(response);
            });
        };
    });
