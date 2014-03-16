var nodeServices = angular.module('nodeServices', ['ngResource']);

nodeServices.factory('Node', ['$resource',
  function($resource){
    return $resource('api/nodes/:nodeId', {}, {
      'get': {method:'GET', params:{nodeId:'@nodeId'}, isArray:false},
      'save': {method:'POST'},
      'query': {method:'GET', isArray:true},
      'update': {method:'PUT'},
      'remove': {method:'DELETE'},
      'delete': {method:'DELETE'}
    });
  }]);
