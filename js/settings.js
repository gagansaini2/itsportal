(function($) {
	"use strict";

	$(window).load(function() {
		$("#loader").fadeOut("slow");
	});

	$(document).ready(function() {

		// ====================================================================
		


		// Header scroll function
		$("#workex").change(function(){
			if ($(this).val == 1 ) {
			$('#div1').show();
			};
		})	

		$(window).scroll(function() {    
			var scroll = $(window).scrollTop();
			if (scroll > 50) {
				$("#header-background").slideDown(300);
			} else {
				$("#header-background").slideUp(300);
			}
		});

		// ====================================================================

		// Flex Menu

		$('.menu').flexMenu({
			breakpoint: 3000,
			responsivePattern: 'off-canvas',
			animationSpeed: 300
		});

		$(".fm-button").click(function(){
			if($("header").css('left') == '0px'){
				$("header").stop().animate({left:'240px'},300);
			};
			if($("header").css('left') == '240px'){
				$("header").stop().animate({left:'0px'},300);
			};
		 });

		// ====================================================================

		// Searchbox

		if ($(document).width() > 480) {

			$("#searchbox").css({
				'opacity': '0',
				'position': 'relative',
				'top': '0',
				'width': '0'
			});

			$("#search a").click(function(){

				if($("#searchbox").css('opacity') == '0'){
					$("#searchbox").stop().animate({
						opacity: '1',
						position: 'relative',
						top:'0',
						width:'200px'
					},300);
				};

				if($("#searchbox").css('opacity') == '1'){
					$("#searchbox").stop().animate({
						opacity: '0',
						position: 'relative',
						top:'0',
						width:'0px'
					},300);
				};

			});

		}

		// Searchbox for smartphones

		else {

			$("#searchbox").css({
				'opacity': '0',
				'position': 'absolute',
				'top': '-62px',
				'width': '100%'
			});

			$("#search a").click(function(){

				if($("#searchbox").css('opacity') == '0'){
					$("#searchbox").stop().animate({
						position: 'absolute',
						top:'50px',
						opacity: '1',
						width:'100%'
					},300);
				};

				if($("#searchbox").css('opacity') == '1'){
					$("#searchbox").stop().animate({
						position: 'absolute',
						top:'-62px',
						opacity: '0',
						width:'100%'
					},300);
				};

			});

		}

		$(window).resize(function() {

			if ($(document).width() > 480) {

				$("#searchbox").css({
					'opacity': '0',
					'position': 'relative',
					'top': '0',
					'width': '0'
				});

				$("#search a").click(function(){

					if($("#searchbox").css('opacity') == '0'){
						$("#searchbox").stop().animate({
							opacity: '1',
							position: 'relative',
							top:'0',
							width:'200px'
						},300);
					};

					if($("#searchbox").css('opacity') == '1'){
						$("#searchbox").stop().animate({
							opacity: '0',
							position: 'relative',
							top:'0',
							width:'0px'
						},300);
					};

				});

			}

			// Searchbox for smartphones

			else {

				$("#searchbox").css({
					'opacity': '0',
					'position': 'absolute',
					'top': '-62px',
					'width': '100%'
				});

				$("#search a").click(function(){

					if($("#searchbox").css('opacity') == '0'){
						$("#searchbox").stop().animate({
							position: 'absolute',
							top:'50px',
							opacity: '1',
							width:'100%'
						},300);
					};

					if($("#searchbox").css('opacity') == '1'){
						$("#searchbox").stop().animate({
							position: 'absolute',
							top:'-62px',
							opacity: '0',
							width:'100%'
						},300);
					};

				});

			}

		});

		// ====================================================================

		// Slider

		$('#slider').css({'height': (($(window).height()-0))+'px'});
		$(window).resize(function(){
			$('#slider').css({'height': (($(window).height()-0))+'px'});
		});

		var Page = (function() {

			var $navArrows = $( '#nav-arrows' ),
				$nav = $( '#nav-dots > span' ),
				slitslider = $( '#slider' ).slitslider( {
					onBeforeChange : function( slide, pos ) {

						$nav.removeClass( 'nav-dot-current' );
						$nav.eq( pos ).addClass( 'nav-dot-current' );

					}
				} ),

				init = function() {

					initEvents();
					
				},
				initEvents = function() {

					// add navigation events
					$navArrows.children( ':last' ).on( 'click', function() {

						slitslider.next();
						return false;

					} );

					$navArrows.children( ':first' ).on( 'click', function() {
						
						slitslider.previous();
						return false;

					} );

					$nav.each( function( i ) {
					
						$( this ).on( 'click', function( event ) {
							
							var $dot = $( this );
							
							if( !slitslider.isActive() ) {

								$nav.removeClass( 'nav-dot-current' );
								$dot.addClass( 'nav-dot-current' );
							
							}
							
							slitslider.jump( i + 1 );
							return false;
						
						} );
						
					} );

				};

				return { init : init };

		})();

		Page.init();

		// ====================================================================

		// Jobs

		$("#more-jobs").click(function(){
			$(this).toggleClass('on');
			$('.hidden-job').toggle(0);
		 });

		// ====================================================================

		// Carousels

		$("#blog .owl-carousel").owlCarousel({
			margin: 20,
			loop: true,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-arrow-left fa-2x"></i>','<i class="fa fa-arrow-right fa-2x"></i>'],
			responsive:{
				0:{
					items:1
				},
				767:{
					items:2
				}
			}
		});

		$("#testimonials .owl-carousel").owlCarousel({
			items: 1,
			loop: true,
			margin: 50,
			dots: false,
			autoplay: true,
			autoplaySpeed: 1500,
			nav: false
		});

		$("#clients .owl-carousel").owlCarousel({
			items: 5,
			margin: 50,
			loop: true,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-arrow-left fa-2x"></i>','<i class="fa fa-arrow-right fa-2x"></i>'],
			responsive:{
				0:{
					items:1
				},
				481:{
					items:2
				},
				767:{
					items:3
				},
				992:{
					items:4
				},
				1200:{
					items:6
				}
			}
		});

		$("#team .owl-carousel").owlCarousel({
			items: 4,
			margin: 30,
			loop: true,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-arrow-left fa-2x"></i>','<i class="fa fa-arrow-right fa-2x"></i>'],
			responsive:{
				0:{
					items:1
				},
				481:{
					items:2
				},
				767:{
					items:3
				},
				992:{
					items:4
				}
			}
		});

		// ====================================================================

		// Counterup

		$('.number').counterUp({
			delay: 10, // the delay time in ms
			time: 1000 // the speed time in ms
		});

		// ====================================================================

		// Form Sliders

		$('#years').noUiSlider({
			start: [3],
			connect: "lower",
			step: 1,
			range: {
				'min': 0,
				'max': 15
			},
			format: wNumb({
				decimals: 0
			})
		});

		$("#years").Link('lower').to($("#years-field"));

		$('#salary').noUiSlider({
			start: [40000,80000],
			connect: true,
			step: 1000,
			range: {
				'min': 0,
				'max': 150000
			},
			format: wNumb({
				decimals: 0,
				thousand: '.',
				prefix: '$'
			})
		});

		$("#salary").Link('lower').to($("#salary-field-lower"));
		$("#salary").Link('upper').to($("#salary-field-upper"));


		// ====================================================================

		// Bootstrap Wysiwyg

		$('.textarea').wysihtml5({
			toolbar: {
				"font-styles": false,
				"blockquote": false,
				"image": false,
				"fa": true
			}
		});
		
		// ====================================================================

		// Flickr Feed

		$('#flickr').jflickrfeed({
			limit: 9,
			qstrings: {
				id: '89775615@N00'
			},
			itemTemplate: 
			'<li>' +
				'<a href="{{image_b}}" class="fancybox" rel="gallery"><img src="{{image_s}}" alt="{{title}}" /></a>' +
			'</li>'
		});

		// ====================================================================

		// Fancybox

		$('.fancybox').fancybox({
			openEffect: 'none'
		});

		// ====================================================================

		// Register & Login

		$(".link-login").click(function () {
			$("#login").fadeIn(300);
			$("body").addClass("no-scroll");
		});

			$("#login .close").click(function () {
				$("#login").fadeOut(300);
				$("body").removeClass("no-scroll");
			});

		$(".link-register").click(function () {
			$("#register").fadeIn(300);
			$("body").addClass("no-scroll");
		});

			$("#register .close").click(function () {
				$("#register").fadeOut(300);
				$("body").removeClass("no-scroll");
			});

		// ====================================================================

		// Accordion
		


		function toggleChevron(e) {
	    $(e.target)
			.prev('.panel-heading')
			.find("i.indicator")
			.toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
		}
		$('#accordion').on('hidden.bs.collapse', toggleChevron);
		$('#accordion').on('shown.bs.collapse', toggleChevron);

		// ====================================================================

		// Adding rows in forms

		// 1. Adding social networks

		// var NewSkill='<div class="row form-group col-sm-7" ><selectize config="myConfig" options="myOptions" ng-model="form.keyskill"></selectize><input type="text" class="form-control" name="keyskills[]" /> </div><div class="center_form col-sm-5" id="rating" data-toggle="tooltip" title="Rate Yourself"> <input type="radio" name="keyskills[][star][]" class="rating" value="1"/> <input type="radio" name="keyskills[][star][]" class="rating" value="2"/> <input type="radio" name="keyskills[][star][]" class="rating" value="3"/> <input type="radio" name="keyskills[][star][]" class="rating" value="4"/> <input type="radio" name="keyskills[][star][]" class="rating" value="5"/> </div>'
		// $("#add-more-skills").click(function(){
		// 	$(this).parent().parent().parent().before(NewSkill);
			
		// 	$("#rating").rating();
		// 	$('[data-toggle="tooltip"]').tooltip();
		// 	$("#rating").attr("id","rating1");

		// });
		// 2. Adding experience

		var NewExperience='<div class="col-sm-11"><div class="form-group"> <input type="text" class="form-control" name="compname[]" placeholder="Company Name" ng-model="form.compname[]"><span id="span_compname"></span> <br><input type="text" class="form-control" name="jobtitle[]" placeholder="Job Title" ng-model="form.jobtitle"><span id="span_jobtitle"></span> <br><div class="row"> <div class="form-group col-sm-3" id="age-group" style="padding-top: 6px;"> <label>Working Time</label> <span id="span_day"></span> </div><div class="form-group col-sm-3" id="age-group"> <select name="workinmonth[]" id="month" class="form-control" placeholder="January" ng-model="form.workinmonth"> <option value="" selected="">Month</option> <option value="01">January</option> <option value="02">February</option> <option value="03">March</option> <option value="04">April</option> <option value="05">May</option> <option value="06">June</option> <option value="07">July</option> <option value="08">August</option> <option value="09">September</option> <option value="10">October</option> <option value="11">November</option> <option value="12">December</option> </select> <span id="span_month"></span> </div><div class="form-group col-sm-3" id="age-group"> <input type="text" id="age" class="form-control" name="workinday[]" placeholder="Date" ng-model="form.workinday"> <span id="span_day"></span> </div><div class="form-group col-sm-3" id="age-group"> <input type="text" id="age" class="form-control" name="workinyear[]" placeholder="Year" ng-model="form.workinyear"> <span id="span_year"></span> </div></div></div></div>'
					$("#add-experience").click(function(){
			$(this).parent().parent().parent().before(NewExperience);
			
		});

		// 3. Adding education

		var NewEducation='<div class="row"> <div class="form-group col-sm-11"> <label>Qualification</label> <select name="highestqualification[]" class="form-control" id="highestqualification" ng-model="edddd"> <option value="">Select your highest qualification</option> <option value="Doctorate/Phd">Doctorate/Phd</option> <option value="Masters">Postgraduate</option> <option value="Undergraduate">Undergraduate</option> </select><span id="span_highestqualification"></span> </div><div class="form-group col-sm-11"> <label>Course</label> <input type="text" class="form-control" name="course[]" placeholder="Enter Course"> <span id="span_course"></span> </div><div class="form-group col-sm-11"> <label>Specialization</label> <input type="text" class="form-control" name="specialization[]" placeholder="Enter Specialization"> <span id="span_specialization"></span> </div><div class="form-group col-sm-11"> <label>University/College</label> <input type="text" class="form-control" name="university[]" placeholder="Institute Name"> <span id="span_university"></span> </div><div class="form-group col-sm-11"> <label>City</label> <input type="text" class="form-control" name="city[]" placeholder="City Name"> <span id="span_city"></span> </div><div class="form-group col-sm-11"> <div class="form-group" id="education-dates-group"> <label for="education-dates">Year of Passing</label> <br><select name="year_passing[]" class="form-control"> <option value="">Select</option> <option value="2016">2016</option> <option value="2015">2015</option> <option value="2014">2014</option> <option value="2013">2013</option> <option value="2012">2012</option> <option value="2011">2011</option> <option value="2010">2010</option> <option value="2009">2009</option> <option value="2008">2008</option> <option value="2007">2007</option> <option value="2006">2006</option> <option value="2005">2005</option> <option value="2004">2004</option> <option value="2003">2003</option> <option value="2002">2002</option> <option value="2001">2001</option> <option value="2000">2000</option> <option value="1999">1999</option> <option value="1998">1998</option> <option value="1997">1997</option> <option value="1996">1996</option> <option value="1995">1995</option> <option value="1994">1994</option> <option value="1993">1993</option> <option value="1992">1992</option> <option value="1991">1991</option> <option value="1990">1990</option> <option value="1989">1989</option> <option value="1988">1988</option> <option value="1987">1987</option> <option value="1986">1986</option> <option value="1985">1985</option> <option value="1984">1984</option> <option value="1983">1983</option> <option value="1982">1982</option> <option value="1981">1981</option> <option value="1980">1980</option> <option value="1979">1979</option> <option value="1978">1978</option> <option value="1977">1977</option> <option value="1976">1976</option> <option value="1975">1975</option> <option value="1974">1974</option> <option value="1973">1973</option> <option value="1972">1972</option> <option value="1971">1971</option> <option value="1970">1970</option> </select><span id="span_year_passing"></span> </div></div></div>'
				$("#add-education").click(function(){
			$(this).parent().parent().parent().before(NewEducation);
		});

		// 3. addin certificate

		var NewCertificate='<div class="form-group col-sm-11"> <div class="row"> <div class="col-sm-6"> <input type="text" class="form-control" name="certificate[]" id="certificate" placeholder="Certification Name eg. CCNA"> </div><div class="col-sm-6" > <input type="text" class="form-control" name="certificatenum[]" id="certificate" placeholder="Certificate No."> </div></div></div>'
					$("#add-certificate").click(function(){
				$(this).parent().parent().parent().before(NewCertificate);

			});

		



		$("#workex").change(function (){
			var selVal = $(this).val();
			$("#textboxDiv").html('');
			if (selVal > 0 ) {
				$("#div1").empty();
			
				$("#div1").show();
				for(var i = 1; i<= selVal; i++) {
                $("#div1").append('<input type="text" class="form-control" name=""  placeholder="Company Name"><br>');
            	}
			}else{

				$("#div1").empty();
			};
		});

		
		$("[name='disability']").change(function(){
			var Val = $(this).val();
				
				if (Val == 1) {
				$("#disabilitytype").append('<input type="text" class="form-control" name="disability" ng-model="form.distype" placeholder="Type of Disability">');
				
			}else{
				
				$("#disabilitytype").empty();
			};
		});

		$("[name='chkPassPort']").change(function(){
			var Val = $(this).val();
				
				if (Val == 1) {
				$("#txtPassportNumber").append('<input type="text" class="form-control" placeholder="Passport Number" name="chkPassPort" />');
				
			}else{
				
				$("#txtPassportNumber").empty();
			};
		});

		$('#ratex').rating();
		$('[data-toggle="tooltip"]').tooltip();
		$("[name='buyback']").bootstrapSwitch();
		// $("[name='workingtime[]']").datepicker();
		// $("[name='workingtime[]']").datepicker(function(){
		// 	$(this).click('show');
		// });
		
		
		
		
		var page=window.location.search;
		
			if (page) {
				page=page.substr(6,1);
				page-=1;

			}else{

				page=0;
				
			}

			
			
			 // console.log(page);
			var yo=$("ul.pagination li:eq("+page+")").addClass('active');

			
	//company list view more.......

		// $(".des").each(function(){
		// 	var showchar= 250;
		// 	var start=$(this).text().substr(0,showchar);
		// 	var len=$(this).text().length;
		// 	var more= $(this).text().substr(showchar,len);
		// 	$(this).html(start);

		// 	$("#desclick").click(function(){
		// 		$("#more").html(more);
		// 		$("#desclick").hide();
		// 		$("#closeclick").show();			
		// 	})

		// 	$("#closeclick").click(function(){
		// 		$("#more").html("");
		// 		$("#desclick").show();
		// 		$("#closeclick").hide();	
		// 	})


		// })
			
		var showChar = 250;
		var ellipsestext = "...";
		var moretext = "more";
		var lesstext = "less";
		$('.more').each(function() {
			var content = $(this).html();

			if(content.length > showChar) {

				var c = content.substr(0, showChar);
				var h = content.substr(showChar, content.length);

				var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

				$(this).html(html);
			}

		});

		$(".morelink").click(function(){
			if($(this).hasClass("less")) {
				$(this).removeClass("less");
				$(this).html(moretext);
			} else {
				$(this).addClass("less");
				$(this).html(lesstext);
			}
			$(this).parent().prev().toggle();
			$(this).prev().toggle();
			return false;
		});	
			
		//===================active class for navs=============================

		var path=window.location.pathname;
		// haha=haha.substr(11);
		// console.log(haha);
		
		$(".navbar-nav li [href='"+path+"']").parent().addClass("active");
				// console.log(list);			
			
 		// ====================================================================

		// Scroll Reveal

		window.sr = new scrollReveal({
			reset: true,
			move: '50px',
			mobile: false
        });

		// ====================================================================

	})

})(jQuery);

