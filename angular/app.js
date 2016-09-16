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
    $scope.info.image=response.data.data.image;
    $scope.info.edducation=response.data.data.eddu;
    $scope.info.experince=response.data.data.exp;
    $scope.info.others=response.data.data.others;
    $scope.info.certificates=response.data.data.certificates;
    $scope.info.keyskills=response.data.data.keyskills;

    // $scope.info.others.languages=$scope.info.others.languages_known.toString();
     // console.log($scope.info);
  })


  $scope.myModel;   

$scope.myOptions1 = [];


$http({
    method: "POST",
        url: "api.php?work=get_lang"
      }).then(function(response){
        // console.log(response.data.data);

        // angular.forEach(response.data.data, function(child){
        // $scope.myOptions1.push(child);
        // console.log($scope.myOptions1);
        // });
       for(var x in response.data.data){
            $scope.myOptions1.push({lang: response.data.data[x]});
         }  
      
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

$scope.changes={
  change1 : 0,
  change2 : 0,
  change3 : 0,
  change4 : 0,
  change5 : 0,
  change6 : 0
}
 
$scope.edit1=function(){

  $scope.changes.change1=1;
}


$scope.edit2=function(){

  $scope.changes.change2=1;
}


$scope.edit3=function(){

  $scope.changes.change3=1;
}


$scope.edit4=function(){

  $scope.changes.change4=1;
}


$scope.edit5=function(){

  $scope.changes.change5=1;
}

$scope.edit6=function(){

  $scope.changes.change6=1;
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

      $scope.changes.change1=0;


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

      $scope.changes.change2=0;

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
      $scope.changes.change3=0;
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

      $scope.changes.change4=0;
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
$scope.changes.change5=0;
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
      $scope.changes.change6=0;
}





});










































app.controller('companyprof', function($scope, $http) {


  $scope.load=function(){
    

$scope.companylist=[];


$http({

  method: "POST",
  url: "api.php?work=get_companieslist"

}).then(function(response){
  // console.log(response);
  angular.forEach(response.data.data, function(child){
        $scope.companylist.push(child);
     });   
 console.log($scope.companylist);
 $("#companymodal").modal('show');
});



  }

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


$scope.countries =[];
 
$http({

  method: "POST",
  url: "api.php?work=get_countries"

}).then(function(response){
  // console.log(response.data.data.city);
  angular.forEach(response.data.data, function(child){
        $scope.countries.push(child);
       
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

$scope.edd={};

$scope.job.qualification=[];

$scope.addedu=function(){

$scope.edd.course_type=$scope.edd.course_type.coursetype_name;
$scope.job.qualification.push(angular.copy($scope.edd));


$scope.edd.degree_type="";
$scope.edd.course_type="";
$scope.edd.spec_type="";

};

$scope.removedd=function(index){
 
  var indval=$scope.job.qualification.indexOf(index);

  $scope.job.qualification.splice(indval,1);

};



$scope.$watch('edd.degree_type', function(newp,oldp){

  $scope.list=[];

  if (newp == "Graduate") {
    
      $http({

        method: "POST",
        url: "api.php?work=UG_list",

      }).then(function(response){
       
        angular.forEach(response.data.data, function(child){
        $scope.list.push(child);
        // console.log($scope.list);
        });
      
      })
  };

  if (newp == "Masters") {
     
     $http({

        method: "POST",
        url: "api.php?work=PG_list"

      }).then(function(response){
        angular.forEach(response.data.data, function(child){
        $scope.list.push(child);
        // console.log($scope.list);
        });
      })
  };

  if (newp == "Doctorate/Phd") {
    
    $http({

        method: "POST",
        url: "api.php?work=DOC_list"
      }).then(function(response){
        angular.forEach(response.data.data, function(child){
        $scope.list.push(child);
        // console.log($scope.list);
        });
      })
  };

});



$scope.$watch('edd.course_type', function(newp,oldp){

  $scope.speclist=[];

if ($scope.edd.course_type) {
  $http({
    method: "POST",
    url: "api.php?work=get_spec&spec_type="+$scope.edd.course_type.coursetype_id,
  }).then(function(response){
     angular.forEach(response.data.data, function(child){
        $scope.speclist.push(child);
     });   
  })


};



})








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

   if ($scope.job.shifttimimg == true) {
          $scope.job.shifttimimg = "Yes";
       }else{
        $scope.job.shifttimimg = "No";
       }

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

$scope.login={};

$scope.login=function(){
  // console.log("yo");

      $.ajax({
              
          method: "POST",
          url: "api.php?work=panel_login",

          data: $scope.login,
         
         
                      
         success:function(data){

          var callback = JSON.parse(data);
          console.log(callback.status);
          
          if (callback.status == true) {
            
                $("#loginerr").hide();
              location.reload();
          }

          if (callback.status == false){
              $("#loginerr").show();
                

          }

         
         }


      })


}


$scope.selectcomp=function(com){

$scope.job.company_id=com.company.company_id;

// console.log($scope.job);

$("#companymodal").modal('hide');

}




});


//
































app.controller('companylist', function($scope, $http) {


$scope.load1=function(){


$scope.companylist=[];


$http({

  method: "POST",
  url: "api.php?work=get_companieslist"

}).then(function(response){
   // console.log(response);
  angular.forEach(response.data.data, function(child){
        $scope.companylist.push(child);
     }); 


 console.log($scope.companylist);
});



}



$scope.load2=function(){

  
$scope.myjoblist=[];


$http({

  method: "POST",
  url: "api.php?work=get_myjoblist"

}).then(function(response){
   console.log(response);

     angular.forEach(response.data.data, function(child){ 
        $scope.myjoblist.push(child);
     });  

         for(var x in $scope.myjoblist){
            $scope.myjoblist[x].job.key_skills=JSON.parse($scope.myjoblist[x].job.key_skills);
         }

});

  
}


$scope.load3=function(){

  var jobid=location.search;

  jobid=jobid.substr(8);

  // console.log(jobid);
$scope.emplist=[];


$http({

  method: "POST",
  url: "api.php?work=get_emplist&jobid="+jobid

}).then(function(response){
   // console.log(response);

     angular.forEach(response.data.data, function(child){ 
        $scope.emplist.push(child);
     });  

     for(var x in $scope.emplist){
            for(var y in $scope.emplist[x].exp.empwork){
              $scope.emplist[x].exp.empwork=$scope.emplist[x].exp.empwork[y];
            }
         }

         for(var x in $scope.emplist){
            for(var y in $scope.emplist[x].eddu){
              $scope.emplist[x].eddu=$scope.emplist[x].eddu[y];
            }
         }

        // console.log($scope.emplist);
});

  
}




$scope.deletecomp=function(comp){

// console.log(comp);

$("#delcomp").modal('show');

  $scope.del=function(){

    var main=comp.company.company_id;

      $http({

      method: "POST",
      url: "api.php?work=del_company&companyid="+main

    }).then(function(response){

  $scope.companylist.splice($scope.companylist.indexOf(comp),1);
            
    })


    $("#delcomp").modal('hide'); 
    // console.log(main);   
  };

}

$scope.deljob=function(myjob){
  
  $("#deljob").modal('show');

  $scope.jobdel=function(){

    var main=myjob.job.job_id;

     $http({

      method: "POST",
      url: "api.php?work=del_myjob&jobid="+main

    }).then(function(response){

   $scope.myjoblist.splice($scope.myjoblist.indexOf(myjob),1);
            
    })

     $("#deljob").modal('hide');

  };
}







})
































app.controller('jobSearchCtrl', function($scope, $http) {

$scope.search={};





$scope.myOptions = [];



$scope.myConfig = {
   
  valueField: 'city_id',
  labelField: 'city',
  delimiter: '|',
  placeholder: 'Skills, Companies',
  searchField: ['city'],
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


$scope.searchJob=function(){

$http({

    method: "POST",
    url: "api.php?work=job_search",
    params: $scope.search

}).success(function(response){
  console.log(response);
}).error(function(response){
  console.log(response);
})

}






});





























app.controller('applicantprof', function($scope, $http) {


  var id= window.location.search;

    id= id.substr(1);
  // console.log(id);

$scope.info={};


 $http({

    method: "POST",
    url: "api.php?work=applicant_prof&id="+id

  }).then(function(response){
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


});


















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