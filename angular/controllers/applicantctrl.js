
  'use strict';

app.controller('applicantprof', ["$scope", "$http", "$user_service", function($scope, $http, $user_service) {


  var id= window.location.search;

    id= id.substr(1);
  // console.log(id);

$scope.info={};

  $user_service.applicant_prof(id).then(function(response){
     // console.log(response);
    $scope.info.personal=response.data.data.personal;
    $scope.info.image=response.data.data.image;
    $scope.info.edducation=response.data.data.eddu;
    $scope.info.experince=response.data.data.exp;
    $scope.info.others=response.data.data.others;
    $scope.info.certificates=response.data.data.certificates;
    $scope.info.keyskills=response.data.data.keyskills;

    $scope.info.others.languages=$scope.info.others.languages_known.toString();
    //console.log($scope.info);
  })


}]);



