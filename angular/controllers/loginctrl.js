
  'use strict';




 
app.controller('login', ["$scope", "$http", "$user_service", function($scope, $http, $user_service) {


$scope.forget_pass=function(){

$("#forgot").modal('show');

}

$scope.login={};

$scope.forget=function(isValid){

    if (isValid) {
  console.log($scope.login);

  $user_service.forgot($scope.login.email).then(function(){

    $("#forgot").modal('hide');
    $$scope.login="";
  },function(){

  })

  };

}

}])


