var AppCategoryCtrl = ['$stateParams', '$http', 'BACKEND_API', function($stateParams, $http, BACKEND_API) {
    var self = this;
    self.breadcrumb = [];
    self.category = {};
    self.display_subcategories = function() {
        return true;
    }

    // retrieve specified category and its topics
    $http({
        url: BACKEND_API + 'category/' + $stateParams.slug,
        method: 'GET'
    }).then(function(res) {
        self.category = res.data.category;
    });

    // retrieve forum location
    $http({
        url: BACKEND_API + 'category/' + $stateParams.slug + '/breadcrumb',
        method: 'GET'
    }).then(function(res) {
        function standardize(breadcrumb) {
            result = [], i = 0;
            for(key in breadcrumb) {
                if (i % 3 == 0) {
                    result.unshift({
                        title: breadcrumb[key]
                    });
                } else if (i % 3 == 1){
                    result[0]['slug'] = breadcrumb[key];
                } else {
                    result[0]['id'] = breadcrumb[key];
                }
                ++i;
            }
            return result;
        }
        self.breadcrumb = standardize(res.data.breadcrumb[0]);
        console.log("breadcrumb: " + JSON.stringify(self.breadcrumb));
    });
}];

angular.module("app").controller("AppCategoryCtrl", AppCategoryCtrl);
