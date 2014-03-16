angular.module('app', ['ngRoute', 'nodeServices'])

.config(function($routeProvider) {
  $routeProvider
    .when('/', {
      controller:'ListCtrl',
      templateUrl:'list.html'
    })
    .when('/edit/:nodeId', {
      controller:'EditCtrl',
      templateUrl:'detail.html'
    })
    .when('/new', {
      controller:'CreateCtrl',
      templateUrl:'detail.html'
    })
    .when('/new/:parentId', {
      controller:'CreateCtrl',
      templateUrl:'detail.html'
    })
    .otherwise({
      redirectTo:'/'
    });
})

.controller('ListCtrl', function($scope, Node) {
  $scope.nodes = Node.query();
  $scope.orderProp = 'path';
})

.controller('CreateCtrl', function($scope, $location, $timeout, $routeParams, Node) {
  $scope.parentId = $routeParams.parentId;

  $scope.save = function() {
    Node.save($scope.node, function() {
      $timeout(function() {
        $location.path('/');
      });
    });
  };
})

.controller('EditCtrl',
  function($scope, $location, $timeout, $routeParams, Node) {
    var nodeId = $routeParams.nodeId;
    $scope.node = Node.get({'nodeId': nodeId});

    $scope.destroy = function() {
      Node.remove({nodeId: $scope.node.id}, $scope.node, function() {
        $timeout(function() {
          $location.path('/');
        });
      });
    };

    $scope.save = function() {
      Node.update({nodeId: $scope.node.id}, $scope.node, function() {
        $timeout(function() {
          $location.path('/');
        });
      });
    };
});
