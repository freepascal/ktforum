angular.module("app").filter("range", function() {
    return function(input, total) {
        total = parseInt(total);
        for(i = 1; i <= total; ++i) {
            input.push(i);
        }
        return input;
    };
});
