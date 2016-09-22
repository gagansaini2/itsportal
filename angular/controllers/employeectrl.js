
	'use strict';




 
app.controller('wizform', ["$scope", "$http", "$user_service", function($scope, $http, $user_service) {
 

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
      	 // console.log(response);

      	// angular.forEach(response.data.data, function(child){
       //  $scope.myOptions1.push(child);

      	// }); 
	       for(var x in response.data.data){
            $scope.myOptions1.push({lang: response.data.data[x]});
         }	
    // for(i=0 ;i <response.data.data.length; i++){
    //     $scope.myOptions1.push({lang: response.data.data[i]});
    //   }
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

$(window).unload(function() {

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

      window.location="index.php"

		}

		
    };
	


  }]);
