
  'use strict';


app.controller('companyprof', ["$scope", "$http", "$user_service", function($scope, $http, $user_service) {


//companylist popup on post job page
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
 // console.log($scope.companylist);
 $("#companymodal").modal('show');
});




  }




//company edit page aftr company listings
  $scope.load2=function(){
    

  var compid=location.search;

  compid=compid.substr(4);
  // console.log(compid);

$http({

  method: "POST",
  url: "api.php?work=edit_company&compid="+compid

}).then(function(response){
  // console.log(response);
    $scope.company=angular.copy(response.data.data);
    // $scope.company.push(response.data.data.logo);
    console.log($scope.company);
});



  }



//directly posting a job through companylist page without any popup.......
  $scope.load3=function(){
    

  var compid=location.search;

  compid=compid.substr(11);
  // console.log(compid);
  $scope.job.company_id=compid;
  } 




$scope.load4=function(){


  var jobid=location.search;

  jobid=jobid.substr(7);
  // console.log(jobid);

$http({

  method: "POST",
  url: "api.php?work=edit_myjob&jobid="+jobid

}).then(function(response){
  console.log(response);
    $scope.job=angular.copy(response.data.data.job);
    $scope.job.key_skills=JSON.parse($scope.job.key_skills);
    $scope.job.qualification=JSON.parse($scope.job.qualification);

      if ($scope.job.shift_timimg == "Yes") {

          $scope.job.shift_timimg=true;
      }
      if ($scope.job.shift_timimg == "No") {
         
         $scope.job.shift_timimg=false;
      }
    console.log($scope.job);
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

$scope.editcomp=function(isValid){



  if (isValid) {

  var formData = new FormData();
        formData.append('logo', $('#company_logo')[0].files[0] );
        
        formData.append('companydata',  JSON.stringify($scope.company.company));

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

     window.location="company_list.php"
    };

}



$scope.editmyjob=function(isValid){



  if (isValid) {

  var main={};

   if ($scope.job.shift_timimg == true) {
          $scope.job.shift_timimg = "Yes";
       }else{
        $scope.job.shift_timimg = "No";
       }

  main.job=JSON.stringify($scope.job);


$http({

  method: "POST",
  url: "api.php?work=edit_subjob",
  params: main

}).then(function(response){
  // console.log(response);
  
  window.location="myjob_list.php"
})

};

}


}]);
