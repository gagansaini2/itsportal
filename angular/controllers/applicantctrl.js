
  'use strict';

app.controller('applicantprof', ["$scope", "$http", "$user_service", function($scope, $http, $user_service) {


 $scope.oneAtATime = true;

  // $scope.groups = [
  //   {
  //     title: 'Dynamic Group Header - 1',
  //     content: 'Dynamic Group Body - 1'
  //   },
  //   {
  //     title: 'Dynamic Group Header - 2',
  //     content: 'Dynamic Group Body - 2'
  //   }
  // ];

  // $scope.items = ['Item 1', 'Item 2', 'Item 3'];

  // $scope.addItem = function() {
  //   var newItemNo = $scope.items.length + 1;
  //   $scope.items.push('Item ' + newItemNo);
  // };

  $scope.status = {
    isCustomHeaderOpen: false,
    isFirstOpen: true,
    isFirstDisabled: false
  };





  var id= window.location.search;

    id= id.substr(1);
  // console.log(id);

$scope.info={};

  $user_service.applicant_prof(id).then(function(response){
     console.log(response);
    $scope.info.personal=response.data.personal;
    $scope.info.image=response.data.image;
    $scope.info.edducation=response.data.eddu;
    $scope.info.experince=response.data.exp;
    $scope.info.others=response.data.others;
    $scope.info.certificates=response.data.certificates;
    $scope.info.keyskills=response.data.keyskills;

    $scope.info.others.languages=$scope.info.others.languages_known.toString();
    //console.log($scope.info);
  })


}]);



