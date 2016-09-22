
  'use strict';


app.controller('viewprofile', ["$scope", "$http", "$user_service", function($scope, $http, $user_service) {

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





}]);

