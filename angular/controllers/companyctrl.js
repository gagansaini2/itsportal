
  'use strict';


app.controller('companyprof', ["$scope", "$http", "$user_service", function($scope, $http, $user_service) {


//companylist popup on post job page
  $scope.load=function(){
    

$scope.companylist=[];

$user_service.get_companieslist().then(function(response){
  // console.log(response);
  angular.forEach(response.data, function(child){
        $scope.companylist.push(child);
     });   
 console.log($scope.companylist);
 $("#companymodal").modal('show');
});




  }




//company edit page aftr company listings
  $scope.load2=function(){
    

  var compid=location.search;

  compid=compid.substr(4);
  // console.log(compid);

$user_service.edit_company(compid).then(function(response){
  // console.log(response);
    $scope.company=angular.copy(response.data);
    // $scope.company.push(response.data.data.logo);
    // console.log($scope.company);
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

$user_service.edit_myjob(jobid).then(function(response){
  console.log(response);
    $scope.job=angular.copy(response.data.job);
    $scope.job.qualification=JSON.parse($scope.job.qualification);

      if ($scope.job.shift_timimg == "Yes") {

          $scope.job.shift_timimg=true;
      }
      if ($scope.job.shift_timimg == "No") {
         
         $scope.job.shift_timimg=false;
      }
    // console.log($scope.job);
});


}





$scope.cities =[];
 
$user_service.get_cities().then(function(response){
  // console.log(response.data.data.city);
  angular.forEach(response.data, function(child){
        $scope.cities.push(child);
       
      // console.log($scope.cities);
        });
});


$scope.countries =[];
 
$user_service.get_countries().then(function(response){
  // console.log(response.data.data.city);
  angular.forEach(response.data, function(child){
        $scope.countries.push(child);
       
      // console.log($scope.cities);
        });
});

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
  valueField: 'skill_id',
  labelField: 'skills',
  delimiter: '|',
  placeholder: 'Specify keyskills',
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

$scope.$watch('edd.degree_type', function(newp,oldp){

  if (newp!="") {
    $("#quaferr").hide();
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

    if ($scope.job.qualification.length != 0) {

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

    }else{
      $("#quaferr").show();
    }
  }

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
        url: "api.php?work=edit_subcomp",

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
      if ($scope.job.qualification.length != 0) {

  var main={};

   if ($scope.job.shift_timimg == true) {
          $scope.job.shift_timimg = "Yes";
       }else{
        $scope.job.shift_timimg = "No";
       }

  main.job=JSON.stringify($scope.job);


$user_service.edit_subjob(main).then(function(response){
  // console.log(response);
  
  window.location="myjob_list.php"
})

}else{
   $("#quaferr").show();
}
}
}


}]);
