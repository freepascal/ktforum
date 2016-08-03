var AppTopicCtrl = ['$http', '$stateParams', 'BACKEND_API', function($http, $stateParams, BACKEND_API) {
    var self = this;
    self.topic = {};
    $http({
        url: BACKEND_API + 'topic/' + $stateParams.slug,
        method: 'GET'
    }).then(function(res) {
        self.topic = res.data.topic;
    });
}];

angular.module("app").controller("AppTopicCtrl", AppTopicCtrl);
