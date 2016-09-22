
  'use strict';

app.controller('companylist', ["$scope", "$http", "$user_service", function($scope, $http, $user_service) {

$scope.load1=function(){


$scope.companylist=[];


$user_service.get_companieslist().then(function(response){
   // console.log(response);
  angular.forEach(response.data.data, function(child){
        $scope.companylist.push(child);
     }); 


 // console.log($scope.companylist);
});



}



$scope.load2=function(){

  
$scope.myjoblist=[];

$user_service.get_myjoblist().then(function(response){
   // console.log(response);

     angular.forEach(response.data.data, function(child){ 
        $scope.myjoblist.push(child);
     });  

         for(var x in $scope.myjoblist){
            $scope.myjoblist[x].job.key_skills=JSON.parse($scope.myjoblist[x].job.key_skills);
         }
         // console.log($scope.myjoblist);
         if ($scope.myjoblist.valueOf()=="") {
          $('#myjoblistempty').modal('show');
         };
});

  
}


$scope.load3=function(){

  var jobid=location.search;

  jobid=jobid.substr(8);

  // console.log(jobid);
$scope.emplist=[];

$user_service.get_emplist(jobid).then(function(response){
   console.log(response);

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
        if ($scope.emplist.valueOf()=="") {
          $("#emplist").modal('show');
        };
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







}])

