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
  

$scope.myModel;          //for selectize.........


$scope.form={};      //holds all employee details.....
 





//selectize for keyskills..................


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

//............





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

$scope.addskill=function(){
		// 	var NewSkill='<div class="row form-group col-sm-7" ><selectize config="myConfig" options="myOptions" ng-model="form.keyskill"></selectize><input type="text" class="form-control" name="keyskills[]" /> </div><div class="center_form col-sm-5" id="rating" data-toggle="tooltip" title="Rate Yourself"> <input type="radio" name="keyskills[][star][]" class="rating" value="1"/> <input type="radio" name="keyskills[][star][]" class="rating" value="2"/> <input type="radio" name="keyskills[][star][]" class="rating" value="3"/> <input type="radio" name="keyskills[][star][]" class="rating" value="4"/> <input type="radio" name="keyskills[][star][]" class="rating" value="5"/> </div>'
		// $("#add-more-skills").click(function(){
		// 	$(this).parent().parent().parent().before(NewSkill);
			
		// 	$("#rating").rating();
		// 	$('[data-toggle="tooltip"]').tooltip();
		// 	$("#rating").attr("id","rating1");

		// });
				console.log("kndmsjf");
		};

//save the info.............

$( window ).unload(function() {
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
});
		

//...........
	

	



//retrevin from server.........





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
		
		
		

		
	


  });













//


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