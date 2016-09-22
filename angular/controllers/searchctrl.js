
  'use strict';

app.controller('jobSearchCtrl', ["$scope", "$http", "$user_service", function($scope, $http, $user_service) {

$scope.search={};





$scope.myOptions = [];



$http({
    method: "POST",
        url: "api.php?work=get_skills"
      }).then(function(response){
        // console.log(response);

        angular.forEach(response.data.data, function(child){
        $scope.myOptions.push(child);
       
      
        });
      // console.log($scope.myOptions);
      });  



$scope.myConfig = {
  valueField: 'skill_id',
  labelField: 'skills',
  delimiter: '|',
  placeholder: 'Key Skills',
  searchField: ['skills'],
   onInitialize: function(selectize){
    // receives the selectize object as an argument
  },
  // maxItems: 1
};













$scope.cities =[];


$http({
    method: "POST",
        url: "api.php?work=get_cities"
      }).then(function(response){
        // console.log(response);

        angular.forEach(response.data.data, function(child){
        $scope.cities.push(child);
        // $scope.myOptions.push(child);
      // console.log($scope.cities);
        });
    
      });  


$scope.myConfig1 = {
   maxItems: 3,
  valueField: 'city_id',
  labelField: 'city',
  delimiter: '|',
  placeholder: 'Location',
  searchField: ['city'],
  onInitialize: function(selectize){
    // receives the selectize object as an argument
  },
  // maxItems: 1
};

$scope.exp=[
  {
    year: "0 year",
    value: 0
  },
  {
    year: "1 year",
    value: 1
  },
  {
    year: "2 year",
    value: 2
  },
  {
    year: "3 year",
    value: 3
  },
  {
    year: "4 year",
    value: 4
  },
  {
    year: "5 year",
    value: 5
  },
  {
    year: "6 year",
    value: 6
  },
  {
    year: "7 year",
    value: 7
  },
  {
    year: "8 year",
    value: 8
  },
  {
    year: "9 year",
    value: 9
  },
  {
    year: "10 year",
    value: 10
  },
  {
    year: "11 year",
    value: 11
  },
  {
    year: "12 year",
    value: 12
  },
  {
    year: "13 year",
    value: 13
  },
  {
    year: "14 year",
    value: 14
  },
  {
    year: "15 year",
    value: 15
  },
  {
    year: "16 year",
    value: 16
  },
  {
    year: "17 year",
    value: 17
  },
  {
    year: "18 year",
    value: 18
  },
  {
    year: "19 year",
    value: 19
  },
  {
    year: "20 year",
    value: 20
  },
  {
    year: "21 year",
    value: 21
  },
  {
    year: "22 year",
    value: 22
  },
  {
    year: "23 year",
    value: 23
  },
  {
    year: "24 year",
    value: 24
  },
  {
    year: "25 year",
    value: 25
  },
  {
    year: "26 year",
    value: 26
  },

  {
    year: "27 year",
    value: 27
  },
  {
    year: "28 year",
    value: 28
  },
  {
    year: "29 year",
    value: 29
  },{
    year: "30 year",
    value: 30
  }
];

$scope.myConfig2 = {
  maxItems: 1,
  labelField: 'year',
  valueField: 'value',
  delimiter: '|',
  placeholder: 'Experience',
  
  onInitialize: function(selectize){
    // receives the selectize object as an argument
  },
  // maxItems: 1
};


$scope.salary=[
  {
    Lacs: "<1 Lacs",
    value: "<1"
  },
  {
    Lacs: "0 Lacs",
    value: 0
  },
  {
    Lacs: "1 Lacs",
    value: 1
  },
  {
    Lacs: "2 Lacs",
    value: 2
  },
  {
    Lacs: "3 Lacs",
    value: 3
  },
  {
    Lacs: "4 Lacs",
    value: 4
  },
  {
    Lacs: "5 Lacs",
    value: 5
  },
  {
    Lacs: "6 Lacs",
    value: 6
  },
  {
    Lacs: "7 Lacs",
    value: 7
  },
  {
    Lacs: "8 Lacs",
    value: 8
  },
  {
    Lacs: "9 Lacs",
    value: 9
  },
  {
    Lacs: "10 Lacs",
    value: 10
  },
  {
    Lacs: "11 Lacs",
    value: 11
  },
  {
    Lacs: "12 Lacs",
    value: 12
  },
  {
    Lacs: "13 Lacs",
    value: 13
  },
  {
    Lacs: "14 Lacs",
    value: 14
  },
  {
    Lacs: "15 Lacs",
    value: 15
  },
  {
    Lacs: "16 Lacs",
    value: 16
  },
  {
    Lacs: "17 Lacs",
    value: 17
  },
  {
    Lacs: "18 Lacs",
    value: 18
  },
  {
    Lacs: "19 Lacs",
    value: 19
  },
  {
    Lacs: "20 Lacs",
    value: 20
  },
  {
    Lacs: "21 Lacs",
    value: 21
  },
  {
    Lacs: "22 Lacs",
    value: 22
  },
  {
    Lacs: "23 Lacs",
    value: 23
  },
  {
    Lacs: "24 Lacs",
    value: 24
  },
  {
    Lacs: "25 Lacs",
    value: 25
  },
  {
    Lacs: "26 Lacs",
    value: 26
  },

  {
    Lacs: "27 Lacs",
    value: 27
  },
  {
    Lacs: "28 Lacs",
    value: 28
  },
  {
    Lacs: "29 Lacs",
    value: 29
  },{
    Lacs: "30 Lacs",
    value: 30
  }
];


$scope.myConfig3 = {
  maxItems: 1,
  labelField: 'Lacs',
  valueField: 'value',
  delimiter: '|',
  placeholder: 'Salary',
  
  onInitialize: function(selectize){
    // receives the selectize object as an argument
  },
  // maxItems: 1
};

$scope.result_obj={};
$scope.searchJob=function(){

  var main={};
  main.search=JSON.stringify($scope.search);

  $user_service.job_search(main).then(function(response){
  console.log(response);

    $user_service.set_searchObj(response.data);
      
      window.location="search_result.php"

// $scope.result_obj=response.data;


//          for(var x in $scope.result_obj){
//             $scope.result_obj[x].key_skills=JSON.parse($scope.result_obj[x].key_skills);
//          }

      
// console.log($scope.result_obj);
  },function(response){
    console.log(response);
  })



}

$scope.load=function(){


  $scope.result_obj=$user_service.get_searchObj();

    console.log($scope.result_obj);
}




}]);



