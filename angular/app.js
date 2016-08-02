'use strict';

/**
 * @ngdoc overview
 * @name vacApp
 * @description
 * # vacApp
 *
 * Main module of the application.
 */

var app = angular.module('its', ['selectize','angularFileUpload','angular-input-stars','toggle-switch']);

	app.controller('wizform', function($scope, $http) {
  

$scope.myModel;          //for selectize.........


$scope.form={};      //holds all employee details.....
  

//add more functions.............


  $scope.form.certs=[];
  $scope.form.certs.push({});

$scope.addCert=function(){
$scope.form.certs.push({});
}


$scope.form.extraedd=[];
// $scope.form.edd.push({});

$scope.addedu=function(){
$scope.form.extraedd.push({});	
}

$scope.form.extraexp=[];
// $scope.form.edd.push({});

$scope.addexp=function(){
	//alert("asdad");
$scope.form.extraexp.push({});	
}



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
  placeholder: 'Specify your keyskill',
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
  placeholder: 'Pick Languages',
  searchField: ['lang'],
  onInitialize: function(selectize){
    // receives the selectize object as an argument


  },
  // maxItems: 1
  
};


//ends.............






$scope.form.skills=[];
$scope.form.skills.push({});
$scope.addskill=function(){
	
$scope.form.skills.push({});
			
				
		};

//save the info.............

// $( window ).unload(function() {

// 	// console.log("super");
  				
// 				var main={};
// 				main.name=JSON.stringify($scope.form);
// 		//$scope.test(main);

// 		$.ajax({

// 			method: "POST",
// 				url: "api.php?work=save_info",
// 				data: main,
// 				success:function(data){
// 					console.log("send ");

// 				}

// 		});
// 		// console.log("second");
			
// });
		

//...........
	

// $scope.save=function(){


// 				var main={};
// 				main.name=JSON.stringify($scope.form);
// 		//$scope.test(main);

// 		$.ajax({

// 			method: "POST",
// 				url: "api.php?work=save_info",
// 				data: main,
// 				success:function(data){
// 					console.log("send ");

// 				}

// 		});
// }



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
		
		

		$scope.submit=function(){

			 var jsonData=angular.copy($scope.form);
    		//var objectToSerialize={'object':jsonData};
    		// var prof={};
    		// prof=$scope.form;
    		var objectToSerialize={'object':jsonData};

		
			$http({
				
				method: "POST",
				url: "api.php?work=prof_submit",
			
				 params: objectToSerialize,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    // transformRequest: function (obj) {
                    //     var str = [];
                    //     for (var p in obj)
                    //     str.push(p + "=" + obj[p]);
                    //     return str.join("&");
                    // },
       

			}).success(function(response){
				 console.log(response);
				
				 
				
			}).error(function(response){
				console.log(response);
			});

		}
		

		
	


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

app.directive("fileread", [function () {
    return {
        scope: {
            fileread: "="
        },
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                var reader = new FileReader();
                reader.onload = function (loadEvent) {
                    scope.$apply(function () {
                        scope.fileread = loadEvent.target.result;
                    });
                }
                reader.readAsDataURL(changeEvent.target.files[0]);
            });
        }
    }
}]);