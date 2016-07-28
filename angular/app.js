'use strict';

/**
 * @ngdoc overview
 * @name vacApp
 * @description
 * # vacApp
 *
 * Main module of the application.
 */

var app = angular.module('its', ['selectize','angularFileUpload']);

	app.controller('wizform', function($scope, $http) {
  

$scope.myModel;


$scope.form={};





$scope.myOptions = [];


$http({
 		method: "POST",
        url: "api.php?work=get_skills"
      }).then(function(response){
      	// console.log(response);

      	angular.forEach(response.data.data, function(child){
        $scope.myOptions.push(child);
       
      // console.log($scope.myOptions);
      	});
		
      });  

$scope.myConfig = {
  create: true,
  maxItems: 1,
  valueField: 'skills',
  labelField: 'skills',
  delimiter: '|',
  placeholder: 'Pick something',
  searchField: ['skills'],
  onInitialize: function(selectize){
    // receives the selectize object as an argument
  },
  // maxItems: 1
  onOptionAdd: function(lang,data){
  	$http({
				
				method: "POST",
				url: "api.php?work=add_skills",
				params: data

			}).success(function(response){
				console.log(response);
			}).error(function(response){
				console.log(response);
			});

  },
};







//selectize for language..........

$scope.myOptions1 = [];


$http({
 		method: "POST",
        url: "api.php?work=get_lang"
      }).then(function(response){
      	// console.log(response.data.data);

      	angular.forEach(response.data.data, function(child){
        $scope.myOptions1.push(child);

      	});
		
      });  


$scope.myConfig1 = {
  
  maxItems: 10,
  valueField: 'lang',
  labelField: 'lang',
  delimiter: '|',
  placeholder: 'Pick something',
  searchField: ['lang'],
  onInitialize: function(selectize){
    // receives the selectize object as an argument


  },
  // maxItems: 1
  
};


//ends.............





		$scope.savenow=function(){
			// console.log($scope.form);
			// localStorage.setItem('$scope.form', JSON.stringify($scope.form));


			// var main=JSON.stringify($scope.form);

			var main={};
			main.name=JSON.stringify($scope.form);

		
			$http({
				
				method: "POST",
				url: "api.php?work=save_info",
				params: main

			}).success(function(response){
				console.log(response);
			}).error(function(response){
				console.log(response);
			});

		};



//retrevin from local storage





		$(window).load(function() {
			
			$http({
				
				method: "POST",
				url: "api.php?work=get_info"
				

			}).success(function(response){
				// console.log(response);
				
				 var returninfo=response.data.backinfo;
				
				 $scope.form=JSON.parse(returninfo);
				// console.log(backinfoo);
				
			}).error(function(response){
				console.log(response);
			});

		});
//.......
		
		// $(window).unload(function(JSON.stringify($scope.form)){
			


		// });
		// window.onbeforeunload = function() {
		//     return "Bye now!";
		// };
		
		


		$scope.myfunc=function(){
			console.log("gagan");
		};


  });


app.directive('fileModel', ['$parse', function ($parse) {
            return {
               restrict: 'A',
               link: function(scope, element, attrs) {
                   var model = $parse(attrs.fileModel);
                  var modelSetter = model.assign;
                  
                  element.bind('change', function(){
                   
                     scope.$apply(function(){
                        modelSetter(scope, element[0].files[0]);
                     });
                  });
               }
            };
         }]);