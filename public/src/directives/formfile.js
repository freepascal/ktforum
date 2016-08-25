angular
    .module('app')
    .directive('formFile', function($httppost) {
        return {
            restrict: 'A',
            scope: {
                url: '&'
            }
            link: function(scope, elem, attrs, ctrl) {
                elem.bind('change', function() {
                    var formData = new FormData();
                    formData.append('file', elem[0].files[0]);
                    $httppost(scope.url, formDatta)
                });
            }
        };
    });
