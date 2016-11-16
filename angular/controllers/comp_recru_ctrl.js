
  'use strict';

app.controller('companylist', ["$scope", "$http", "$user_service", "$timeout", function($scope, $http, $user_service, $timeout) {


$scope.list={
  start: 0,
  stop: 10
}
$scope.next=function(){
$scope.list.start+=10;
$('#searchloader').show();
$timeout(function() {

  $('#searchloader').hide();
}, 1000);
  
 
}


$scope.prev=function(){
$scope.list.start-=10;
$('#searchloader').show();
$timeout(function() {
  $('#searchloader').hide();
}, 1000);
  
 
}


$scope.load1=function(){


$scope.companylist=[];



$user_service.get_companieslist().then(function(response){
   // console.log(response);
  angular.forEach(response.data, function(child){
        $scope.companylist.push(child);
     }); 
$scope.companylist.check=$scope.companylist.length;

 console.log($scope.companylist);
});



}



$scope.load2=function(){

  
$scope.myjoblist=[];

$user_service.get_myjoblist().then(function(response){
   console.log(response);

     angular.forEach(response.data, function(child){ 
        $scope.myjoblist.push(child);
     });  

         for(var x in $scope.myjoblist){
            $scope.myjoblist[x].job.key_skills=JSON.parse($scope.myjoblist[x].job.key_skills);
           
         }
         $scope.myjoblist.check=$scope.myjoblist.length;
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
   // console.log(response);

     angular.forEach(response.data, function(child){ 
        $scope.emplist.push(child);
     });  

     // for(var x in $scope.emplist){
     //        for(var y in $scope.emplist[x].exp.empwork){
     //          $scope.emplist[x].exp.empwork=$scope.emplist[x].exp.empwork[y];
     //        }
     //     }

         // for(var x in $scope.emplist){
         //    for(var y in $scope.emplist[x].eddu){
         //      $scope.emplist[x].eddu=$scope.emplist[x].eddu[y];
         //    }
         // }
         $scope.emplist.check=$scope.emplist.length;
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

      $user_service.del_company(main).then(function(response){

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

     $user_service.del_myjob(main).then(function(response){

   $scope.myjoblist.splice($scope.myjoblist.indexOf(myjob),1);
            
    })

     $("#deljob").modal('hide');

  };
}







}])

