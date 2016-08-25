'use strict';

/**
 * @ngdoc overview
 * @name vacApp
 * @description
 * # vacApp
 *
 * Main module of the application.
 */

var app = angular.module('its', ['selectize','angular-input-stars','toggle-switch','ui.bootstrap','ngAnimate','ngTouch']);




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

$( window ).unload(function() {

	// console.log("super");
  				
				var main={};
				main.name=JSON.stringify($scope.form);
		//$scope.test(main);

		$.ajax({

			method: "POST",
				url: "api.php?work=save_info",
				data: main,
				success:function(data){
					console.log("send ");

				}

		});
		// console.log("second");
			
});
		

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
         if(response.data.backinfo!= undefined){
          $scope.form=JSON.parse(returninfo);
        
         }
				
				 // console.log(backinfoo);
				
			}).error(function(response){
				console.log(response);
			});

		});
//.......
		
		

		$scope.submit=function(isValid){

      if (isValid) {


			 var profdata=angular.copy($scope.form);                                    
       if (profdata.disability == true) {
          profdata.disability = "Yes";
       }else{
        profdata.disability = "No";
       }
                          
       if (profdata.passport == true) {
          profdata.passport = "Yes";
       }else{
        profdata.passport = "No";
       }

       if (profdata.relocate == true) {
          profdata.relocate = "Yes";
       }else{
        profdata.relocate = "No";
       }

         if (profdata.buyback == true) {
          profdata.buyback = "Yes";
       }else{
        profdata.buyback = "No";
       }


         
        profdata.pic = "";                                        
    		
    		var main={'profile':profdata};                            //main is json format object



        var formData = new FormData();
        formData.append('file', $('#file')[0].files[0] );
        formData.append('txtfile', $('#txtfile')[0].files[0] );
        formData.append('profdata',  JSON.stringify(main));
		
			$.ajax({
				
				method: "POST",
				url: "api.php?work=prof_submit",

				//params: main,
        data: formData,
        contentType: false,
        processData: false,
       
                    
       success:function(data){
        console.log(data);
       }

			})

      // window.location="index.php"

		}

		
    };
	


  });












































app.controller('viewprofile', function($scope, $http) {


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



//cities api

$scope.cities =[];
 
$http({

  method: "POST",
  url: "api.php?work=get_cities"

}).then(function(response){
  // console.log(response.data.data.city);
  angular.forEach(response.data.data, function(child){
        $scope.cities.push(child);
       
      // console.log($scope.cities);
        });
});










  $scope.info={};

  $http({

    method: "POST",
    url: "api.php?work=view_prof"
  }).then(function(response){
    // console.log(response);
    $scope.info.personal=response.data.data.personal;
    $scope.info.edducation=response.data.data.eddu;
    $scope.info.experince=response.data.data.exp;
    $scope.info.others=response.data.data.others;
    $scope.info.certificates=response.data.data.certificates;
    $scope.info.keyskills=response.data.data.keyskills;

    $scope.info.others.languages=$scope.info.others.languages_known.toString();
    console.log($scope.info);
  })


  $scope.myModel;   

$scope.myOptions1 = [];


$http({
    method: "POST",
        url: "api.php?work=get_lang"
      }).then(function(response){
        // console.log(response.data.data);

        angular.forEach(response.data.data, function(child){
        $scope.myOptions1.push(child);
        // console.log($scope.myOptions1);
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
        // console.log(response);
      }).error(function(response){
        // console.log(response);
      });

  },
};




//add more functions

$scope.addexp1=function(){

$scope.info.experince.empwork.push({});

}

$scope.addedu1=function(){

$scope.info.edducation.push({});

}

$scope.addCert1=function(){

$scope.info.certificates.push({});

}

$scope.addskill1=function(){

$scope.info.keyskills.push({});

}

//edit functions...........
 $scope.change1=0;
$scope.edit1=function(){

  $scope.change1=1;
}

$scope.change2=0;
$scope.edit2=function(){

  $scope.change2=1;
}

$scope.change3=0;
$scope.edit3=function(){

  $scope.change3=1;
}

$scope.change4=0;
$scope.edit4=function(){

  $scope.change4=1;
}

$scope.change5=0;
$scope.edit5=function(){

  $scope.change5=1;
}
$scope.change6=0;
$scope.edit6=function(){

  $scope.change6=1;
}

//save chnages functions//////////

$scope.save_personal=function(){

 var main={};

  main=angular.copy($scope.info.personal);

  $http({
        
        method: "POST",
        url: "api.php?work=save_personal",
        params: main

      }).success(function(response){
        // console.log(response);
      }).error(function(response){
        // console.log(response);
      });


        var formData = new FormData();
        formData.append('file', $('input[type=file]')[0].files[0] );
       
    
      $.ajax({
        
        method: "POST",
        url: "api.php?work=save_personal",

        //params: main,
        data: formData,
        contentType: false,
        processData: false,
       
                    
       success:function(data){
        console.log(data);
       }

      })

      $scope.change1=0;


}



$scope.save_exp=function(){

 var main={};

  main.exp=JSON.stringify($scope.info.experince);

  $http({
        
        method: "POST",
        url: "api.php?work=save_exp",
        params: main

      }).success(function(response){
        // console.log(response);
      }).error(function(response){
        // console.log(response);
      });

      $scope.change2=0;

}



$scope.save_education=function(){

 var main={};

  main.exp=JSON.stringify($scope.info.edducation);

  $http({
        
        method: "POST",
        url: "api.php?work=save_education",
        params: main

      }).success(function(response){
        // console.log(response);
      }).error(function(response){
        // console.log(response);
      });
      $scope.change3=0;
}

$scope.save_certification=function(){

 var main={};

  main.exp=JSON.stringify($scope.info.certificates);

  $http({
        
        method: "POST",
        url: "api.php?work=save_certification",
        params: main

      }).success(function(response){
        // console.log(response);
      }).error(function(response){
        // console.log(response);
      });

      $scope.change4=0;
}

$scope.save_skills=function(){

 var main={};

  main.exp=JSON.stringify($scope.info.keyskills);

  $http({
        
        method: "POST",
        url: "api.php?work=save_skills",
        params: main

      }).success(function(response){
        // console.log(response);
      }).error(function(response){
        // console.log(response);
      });
$scope.change5=0;
}

$scope.save_others=function(){

 var main={};

 main.exp=JSON.stringify($scope.info.others);

 

  $http({
        
        method: "POST",
        url: "api.php?work=save_others",
        params: main

      }).success(function(response){
        // console.log(response);
      }).error(function(response){
        // console.log(response);
      });
      $scope.change6=0;
}





});










































app.controller('companyprof', function($scope, $http) {

$scope.cities =[];
 
$http({

  method: "POST",
  url: "api.php?work=get_cities"

}).then(function(response){
  // console.log(response.data.data.city);
  angular.forEach(response.data.data, function(child){
        $scope.cities.push(child);
       
      // console.log($scope.cities);
        });
});


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
  valueField: 'skills',
  labelField: 'skills',
  delimiter: '|',
  placeholder: 'Specify keyskills',
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
        // console.log(response);
      }).error(function(response){
        // console.log(response);
      });

  },
};

$scope.company={};
$scope.job={};


$scope.submitcomp=function(isValid){
  
  if (isValid) {

  var formData = new FormData();
        formData.append('logo', $('#company_logo')[0].files[0] );
        
        formData.append('companydata',  JSON.stringify($scope.company));

  $.ajax({
        
        method: "POST",
        url: "api.php?work=comp_submit",

        //params: main,
        data: formData,
        contentType: false,
        processData: false,
       
                    
       success:function(data){
        console.log(data);
       }

      })

    window.location="postjob.php"
    };
}

$scope.submitjob=function(isValid){

  if (isValid) {

  var main={};

  main.job=JSON.stringify($scope.job);


$http({

  method: "POST",
  url: "api.php?work=job_submit",
  params: main

}).then(function(response){
  // console.log(response);
  $('#myyModal').modal('show');
})

};

}


});


//




app.directive("fileread", ['$http', function ($http) {
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