
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

 $user_service.get_cities().then(function(response){
  // console.log(response.data.data.city);
  angular.forEach(response.data, function(child){
        $scope.cities.push(child);
       
      // console.log($scope.cities);
        });
});










  $scope.info={};

  $user_service.view_prof().then(function(response){
    console.log(response);
    $scope.info.personal=response.data.personal;
    $scope.info.image=response.data.image;
    $scope.info.edducation=response.data.eddu;
    $scope.info.experince=response.data.exp;
    $scope.info.others=response.data.others;
    $scope.info.certificates=response.data.certificates;
    $scope.info.keyskills=response.data.keyskills;
    if ($scope.info.certificates == null) {
        $scope.info.certificates=[];
    };
     if ($scope.info.keyskills == null) {
        $scope.info.keyskills=[];
    };
     if ($scope.info.experince.empwork == null) {
        $scope.info.experince.empwork=[];
    };
    // $scope.info.others.languages=$scope.info.others.languages_known.toString();
     console.log($scope.info);
  })


  $scope.myModel;   

$scope.myOptions1 = [];


$user_service.get_lang().then(function(response){
        // console.log(response.data.data);

        // angular.forEach(response.data.data, function(child){
        // $scope.myOptions1.push(child);
        // console.log($scope.myOptions1);
        // });
       for(var x in response.data){
            $scope.myOptions1.push({lang: response.data[x]});
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
      },function(response){
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








//remove the exp 


$scope.remexp=function(index){

  // console.log(index);

  $scope.info.experince.empwork.splice(index,1);

}


$scope.remcerti=function(index){

  $scope.info.certificates.splice(index,1)
}


$scope.remskill=function(index){

   $scope.info.keyskills.splice(index,1)  
}





























//save chnages functions//////////

$scope.save_personal=function(){

 var main={};

  main=angular.copy($scope.info.personal);

  
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

 $user_service.save_exp(main).then(function(response){
        // console.log(response);
      },function(response){
        // console.log(response);
      });

      $scope.changes.change2=0;

}



$scope.save_education=function(){

 var main={};

  main.exp=JSON.stringify($scope.info.edducation);

  $user_service.save_education(main).then(function(response){
        // console.log(response);
      },function(response){
        // console.log(response);
      });
      $scope.changes.change3=0;
}

$scope.save_certification=function(){

 var main={};

  main.exp=JSON.stringify($scope.info.certificates);

  $user_service.save_certification(main).then(function(response){
        // console.log(response);
      },function(response){
        // console.log(response);
      });

      $scope.changes.change4=0;
}

$scope.save_skills=function(){

 var main={};

  main.exp=JSON.stringify($scope.info.keyskills);

  $user_service.save_skills(main).then(function(response){
        // console.log(response);
      },function(response){
        // console.log(response);
      });
$scope.changes.change5=0;
}

$scope.save_others=function(){

 var main={};

 main.exp=JSON.stringify($scope.info.others);

 

  $user_service.save_others(main).then(function(response){
        // console.log(response);
      },function(response){
        // console.log(response);
      });
      $scope.changes.change6=0;
}





}]);

