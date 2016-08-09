var AppCategoryCtrl = ['$stateParams', '$http', 'BACKEND_API', function($stateParams, $http, BACKEND_API) {
    var self = this;
    self.breadcrumb = [];
    self.category = {};
    self.subforumsExpandableIcon = {
        state: false, // true if is minus-icon
        toggle: function() {
            if (self.subforumsExpandableIcon.state) {
                angular.element("#collapsible").attr({
                    'src': 'images/plus-icon.png'
                });
            } else {
                angular.element("#collapsible").attr({
                    'src': 'images/minus-icon.png'
                });
            }
            self.subforumsExpandableIcon.state = !self.subforumsExpandableIcon.state;
        }
    };

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

    // initialize topic Paginator
    self.topicPaginator = {
        page_current: 1,
        page_capacity: 5
    };

    self.topicPaginator.paginate = function() {
        console.log('topicPaginator: (page: ' + this.page_current + ', capacity: ' + this.page_capacity + ')');
        var self = this;
        url = BACKEND_API + 'topic/paginate/'
                            + $stateParams.slug + '/'
                            + this.page_current + '/'
                            + this.page_capacity;
        $http({
            url: url,
            method: 'GET'
        }).then(function(response) {
            self.page_topics = response.data.page_topics;
            self.total_topics = response.data.total_topics;
            self.total_pages = Math.ceil(self.total_topics/self.page_capacity);
        });
    };

    self.topicPaginator.toPage = function(page_current) {
        this.page_current = page_current;
        this.paginate();
    };

    self.topicPaginator.paginate();
}];

angular.module("app").controller("AppCategoryCtrl", AppCategoryCtrl);
