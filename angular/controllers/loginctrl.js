
  'use strict';




 
app.controller('login', ["$scope", "$http", "$user_service", "$timeout", function($scope, $http, $user_service, $timeout) {


$scope.forget_pass=function(){

$("#forgot").modal('show');

}

$scope.login={};

$scope.forget=function(){

    // if (isValid) {
    	
  // console.log($scope.login);

     $user_service.forgot($scope.login.email).then(function(response){
    

      if (response.status == true) {
         $("#idregnot").hide();
        $("#recovrmsg").show();

        $timeout(function(){
          
          $("#forgot").modal('hide');
          $scope.login="";
          $("#recovrmsg").hide();
        
        },4000)
      }else{
      $("#idregnot").show();

      } 

  },function(){
  
  })



 

  // };

}


$scope.panelforgot=function(){

$("#loginModal").modal('hide');
$("#forgot").modal('show'); 


}







$scope.loginpan={};

$scope.signin=function(){
  // console.log("yo");

      $.ajax({
              
          method: "POST",
          url: "api.php?work=panel_login",

          data: $scope.loginpan,
         
         
                      
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



//load function for my profile
$scope.prof={};

$scope.load=function(){

$user_service.get_name().then(function(response){

console.log(response);

$scope.prof=angular.copy(response.data);

  switch($scope.prof.type){
    case '2' :
      $scope.prof.type="Jobseeker";
       break;
    case '3' :
      $scope.prof.type="Company Professional";
       break;
    case '4':
      $scope.prof.type="Recruiter";  
       break;
  }

},function(){


})


}



$scope.save_profile=function(isValid){

  if (isValid) {

    var main=$scope.prof;

    if (!$scope.prof.change) {

       $user_service.save_profile(main).then(function(response){

          // console.log(response);

        
          $("#changeModal").modal('show');

          },function(){


          })



    };


    if ($scope.prof.pass == $scope.prof.password) {
      $("#passerr").hide();

        if ($scope.prof.newpass == $scope.prof.confirmpass) {
            

          $user_service.save_profile(main).then(function(response){

          // console.log(response);
          $scope.prof.pass="";
          $scope.prof.newpass="";
          $scope.prof.confirmpass="";

          $scope.prof.change=false;

          $("#confirmpasserr").hide();
          $("#changeModal").modal('show');

          },function(){


          })

        }else{
          $("#confirmpasserr").show();
        }
        

    }else{
      $("#passerr").show();
    }
   
    




  };

}










}])




