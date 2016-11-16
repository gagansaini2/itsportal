
	'use strict';




 
app.controller('wizform', ["$scope", "$http", "$user_service", function($scope, $http, $user_service) {
 

$scope.form={};      //holds all employee details.....

//gettin username and name..........
$user_service.get_name().then(function(response){
  console.log(response);

  $scope.form.fname=response.data.name;
  $scope.form.email=response.data.user;
  $scope.form.phnno=response.data.phoneno; 
},function(){

})





$scope.myModel;          //for selectize.........



  

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

$user_service.get_skills().then(function(response){
      	// console.log(response);

      	angular.forEach(response.data, function(child){
        $scope.myOptions.push(child);
       
      // console.log($scope.myOptions);
      	});
		
      });  

$scope.myConfig = {
  create: true,
  maxItems: 1,
  valueField: 'skill_id',
  labelField: 'skills',
  delimiter: '|',
  placeholder: 'Specify your keyskill',
  searchField: ['skills'],
  onInitialize: function(selectize){
    // receives the selectize object as an argument
  },
  // maxItems: 1
  onOptionAdd: function(lang,data){
  	
    $user_service.add_skills(data).then(function(response){
        // console.log(response);
      },function(){
    })
    
  },
};

//............





//selectize for language..........

$scope.myOptions1 = [];

$user_service.get_lang().then(function(response){
      	 // console.log(response);

	       for(var x in response.data){
            $scope.myOptions1.push({lang: response.data[x]});
         }	
    
      },function(){

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
			
			$user_service.get_info().then(function(response){
				// console.log(response);
				
				 var returninfo=response.data.backinfo;
         if(response.data.backinfo!= undefined){
          $scope.form=JSON.parse(returninfo);
        
         }
				
				 // console.log(backinfoo);
				
			},function(response){
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
