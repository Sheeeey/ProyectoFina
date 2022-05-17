var app = angular.module('app', []);

app.controller('DataCtrl', function($scope) {
    vm = $scope;
    vm.records = [
        { id: 1, time: '0800' },
        { id: 2, time: '1000' }
    ];
});

app.filter('timeFormatter', function() {
    return function(input) {
        return input.substring(0, 2) + ':' + input.substring(2) + ' AM';
    };
});