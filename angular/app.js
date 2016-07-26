'use strict';

/**
 * @ngdoc overview
 * @name vacApp
 * @description
 * # vacApp
 *
 * Main module of the application.
 */

var app = angular.module('its', []);

	app.controller('wizform', function($scope) {
  

		$scope.clickToSubmit=function(){
			alert("fddffddf");
			$("#wizform").submit();
		}


  });