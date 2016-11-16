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


             function get_emplist(jobid) {
                var deferred = $q.defer();
                $http({
                 
                  method: "POST",
                  url: "api.php?work=get_emplist&jobid="+jobid

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



             function del_company(main) {
                var deferred = $q.defer();
                $http({
                 
                  method: "POST",
                    url: "api.php?work=del_company&companyid="+main

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }

            function del_myjob(main) {
                var deferred = $q.defer();
                $http({
                 
                    method: "POST",
                    url: "api.php?work=del_myjob&jobid="+main

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }


            function edit_company(compid) {
                var deferred = $q.defer();
                $http({
                 
                    
                  method: "POST",
                  url: "api.php?work=edit_company&compid="+compid

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



             function edit_myjob(jobid) {
                var deferred = $q.defer();
                $http({
                 
                    
                  method: "POST",
                 url: "api.php?work=edit_myjob&jobid="+jobid

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



            function edit_subjob(main) {
                var deferred = $q.defer();
                $http({
                 
                    
                 method: "POST",
                  url: "api.php?work=edit_subjob",
                  params: main

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }


            function view_prof() {
                var deferred = $q.defer();
                $http({
                 
                    
                 method: "POST",
                 url: "api.php?work=view_prof"

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



             function save_exp(main) {
                var deferred = $q.defer();
                $http({
                 
                    
                 method: "POST",
                    url: "api.php?work=save_exp",
                    params: main

                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }


            function save_education(main) {
                var deferred = $q.defer();
                $http({
                 
                    
                  method: "POST",
                    url: "api.php?work=save_education",
                    params: main


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



            function save_certification(main) {
                var deferred = $q.defer();
                $http({
                 
                    
                method: "POST",
                url: "api.php?work=save_certification",
                params: main


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



            function save_skills(main) {
                var deferred = $q.defer();
                $http({
                 
                    
                 method: "POST",
                url: "api.php?work=save_skills",
                params: main


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



            function save_others(main) {
                var deferred = $q.defer();
                $http({
                 
                    
                 method: "POST",
                url: "api.php?work=save_others",
                params: main


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }


            function get_info() {
                var deferred = $q.defer();
                $http({
                 
                    
                 method: "POST",
                url: "api.php?work=get_info"


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }




































             function get_cities() {
                var deferred = $q.defer();
                $http({
                 
                    
                  method: "POST",
                    url: "api.php?work=get_cities"


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



            function get_countries() {
                var deferred = $q.defer();
                $http({
                 
                    
                 method: "POST",
                url: "api.php?work=get_countries"


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



            function get_skills() {
                var deferred = $q.defer();
                $http({
                 
                    
                 method: "POST",
                 url: "api.php?work=get_skills"


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }



             function add_skills(data) {
                var deferred = $q.defer();
                $http({
                 
                    
                 method: "POST",
                url: "api.php?work=add_skills",
                params: data


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }


            function get_lang() {
                var deferred = $q.defer();
                $http({
                 
                method: "POST",
                url: "api.php?work=get_lang"


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }


            function get_name() {
                var deferred = $q.defer();
                $http({
                 
                method: "POST",
                url: "api.php?work=get_name"


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }


            function save_profile(main) {
                var deferred = $q.defer();
                $http({
                 
                method: "POST",
                url: "api.php?work=save_profile",
                params: main,


                }).success(function (response) {

                    deferred.resolve(response);


                }).error(function (reason) {
                    deferred.resolve(reason);
                });
                return deferred.promise;
            }




             function get_jobs() {
                var deferred = $q.defer();
                $http({
                 
                method: "POST",
                url: "api.php?work=get_jobs",


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
                applicant_prof: applicant_prof,
                get_companieslist: get_companieslist,
                get_myjoblist: get_myjoblist,
                get_emplist: get_emplist,
                del_company: del_company,
                del_myjob: del_myjob,
                edit_company: edit_company,
                edit_myjob: edit_myjob,
                edit_subjob: edit_subjob,
                view_prof: view_prof,
                save_exp: save_exp,
                save_education: save_education,
                save_certification: save_certification,
                save_skills: save_skills,
                save_others: save_others,
                get_info: get_info,
                get_cities: get_cities,
                get_countries: get_countries,
                get_skills: get_skills,
                add_skills: add_skills,
                get_lang: get_lang,
                get_name: get_name,
                save_profile: save_profile,
                get_jobs: get_jobs,
                
            };

          return api;

        }]);