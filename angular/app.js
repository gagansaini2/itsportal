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