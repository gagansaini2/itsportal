        'use strict';

        /**
         * @ngdoc function
         * @name mapsApp.controller:AboutCtrl
         * @description
         * # AboutCtrl
         * Controller of the mapsApp
         */
        angular.module('its')
            .service('$user_service', ['$http', '$q', '$timeout', function ($http, $q, $timeout) {

            // var search_object={};

                
                
            // var ipdata={};    
            // var page_navobj = {};
            /**
             *   page navigation will have the following property 
             *   obj.navpath=navpath;
             *   obj.selltype=selltype;
             *   obj.propertytype=propertytype;
             *   obj.user=user;
             *   obj.location=location;
             */


            // function set_navObj(obj) {
            //     page_navobj = obj;
            // }

            // function get_navObj() {
            //     return page_navobj;
            // }

            var searchObj = {};

            function set_searchObj(obj) {
                searchObj = obj;
                console.log(searchObj);
            }

            function get_searchObj() {
                // console.log('property get -----');
                console.log(searchObj);
                return searchObj;
            }



            var property_obj = {};

            function set_obj(obj) {

                property_obj = obj;
            }

            function get_obj() {

                console.log(property_obj);
                return property_obj;
            }


            function get_session() {
                var promise = $q.defer();
                $http.get('api.php?work=user_logged').
                success(function (data, status, headers, config) {
                    // this callback will be called asynchronously
                    // when the response is available
                    promise.resolve(data);
                }).
                error(function (data, status, headers, config) {
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                    promise.reject(data);
                });
                return promise.promise;
            }



            function forgot(email) {

                // work=login&email=email@email.com&password=admin111
                var deferred = $q.defer();
                $http({
                    url: 'api.php?work=forgot&email=' + email + '',

                }).success(function (response) {
                    deferred.resolve(response);
                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



            function login(email, password) {

                // work=login&email=email@email.com&password=admin111
                var deferred = $q.defer();
                $http({
                    url: 'api.php?work=login&email=' + email + '&password=' + password + '',

                }).success(function (response) {
                    deferred.resolve(response);
                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }


            function register(r_fname, r_lname, r_email, r_password, r_cpassword, r_zip, r_type,r_number) {

                // $fname,$lname,$email,$password,$type,$zip,$key
                var deferred = $q.defer();
                $http({
                    method: "POST",
                    url: 'api.php?work=register',
                    data: {
                        fname: r_fname,
                        lname: r_lname,
                        email: r_email,
                        password: r_password,
                        type: r_type,
                        zip: r_zip,
                        key: ' ',
                        r_number:r_number
                    },
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    transformRequest: function (obj) {
                        var str = [];
                        for (var p in obj)
                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                        return str.join("&");
                    },

                }).success(function (response) {
                    deferred.resolve(response);
                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



             function job_search(main) {
                var deferred = $q.defer();
                $http({
                                    
                    method: "POST",
                    url: "api.php?work=job_search",
                    params: main

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }

            
             function applicant_prof(id) {
                var deferred = $q.defer();
                $http({
                   
                    method: "POST",
                    url: "api.php?work=applicant_prof&id="+id

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



             function get_companieslist() {
                var deferred = $q.defer();
                $http({
                   
                    method: "POST",
                    url: "api.php?work=get_companieslist"

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



             function get_myjoblist() {
                var deferred = $q.defer();
                $http({
                   
                    method: "POST",
                    url: "api.php?work=get_myjoblist"

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }






            var api = {};

            api = {
                set_searchObj: set_searchObj,
                get_searchObj: get_searchObj,
                user_info: get_session,
                login: login,
                register: register,
                forgot: forgot,
                job_search: job_search,
                
            };

            return api;

        }]);