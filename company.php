<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Jobseek - Job Board Responsive HTML Template">
		<meta name="author" content="Coffeecream Themes, info@coffeecream.eu">
		<title>Jobseek - Job Board Responsive HTML Template</title>
	
	</head>
	<body>

		<!-- ============ PAGE LOADER START ============ -->
<?php include('include/header.php'); ?>
		<!-- ============ HEADER END ============ -->

		<!-- ============ TITLE START ============ -->

		<section id="title">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<img src="http://placehold.it/332x120.gif" class="img-responsive" alt="" />
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TITLE END ============ -->

		<!-- ============ CONTENT START ============ -->
		<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<article>
							<h2>Our Process</h2>
							<p></p>
							<hr>
							<h2>Location</h2>


							<!-- Google Map Script -->
							<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
							<script type="text/javascript">

								function initialize()
								{
									//-----------------------------------------------------------------------
									// Create an array of styles.
									
									var styles = [
										{
										"stylers": [
											{ "saturation": -100 },
											{ "gamma": 1 }
										]
										},{
											"featureType": "water",
											"stylers": [
												{ "lightness": -12 }
											]
										}
									];

									//-----------------------------------------------------------------------
									// Create a new StyledMapType object, passing it the array of styles,
									// as well as the name to be displayed on the map type control.
									
									var styledMap = new google.maps.StyledMapType(styles, {
										name: "Styled Map"
									});

									//-----------------------------------------------------------------------
									// Set up map pin position
									
									var latlng = new google.maps.LatLng(40.742284, -73.987866);

									//-----------------------------------------------------------------------
									// Set up map options

									var myOptions =
									{
										scrollwheel: false,
										zoom: 13,
										center: latlng,
										mapTypeControlOptions: {
											mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
										}
									};

									//-----------------------------------------------------------------------
									// Set up map ID's

									var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

									//-----------------------------------------------------------------------
									// Associate the styled map with the MapTypeId and set it to display.

									map.mapTypes.set('map_style', styledMap);
									map.setMapTypeId('map_style');

									//-----------------------------------------------------------------------
									// Setup up map pin image

									var image = {
										// Path to your map pin image
										url: 'images/map-marker.png',
										// This marker is 40 pixels wide by 42 pixels tall.
										size: new google.maps.Size(40, 42),
										// The origin for this image is 0,0.
										origin: new google.maps.Point(0,0),
										// The anchor for this image is the base of the pin at 20,42.
										anchor: new google.maps.Point(20, 42)
									};

									//-----------------------------------------------------------------------
									// Add marker

									var myMarker = new google.maps.Marker({
										position: latlng,
										map: map,
										icon: image,
										clickable: true,
										title:"ITS Recruitment"
									});

									myMarker.info = new google.maps.InfoWindow({
										content: "<b>B 100 A</b><br>South City 1<br>Gurgaon, India"
									});

									google.maps.event.addListener(myMarker, 'click', function() {
										myMarker.info.open(map, myMarker);
									});
								}

								google.maps.event.addDomListener(window, 'load', initialize);
							</script>

							<div id="map-canvas"></div>

							<hr>
							<h2>Jobs</h2>

							

						</article>
					</div>
					<div class="col-sm-4" id="sidebar">
						<div class="sidebar-widget" id="share">
							<h2>Share it</h2>
							<ul>
								<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/home?status=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://plus.google.com/share?url=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html&amp;title=Jobseek%20-%20Job%20Board%20Responsive%20HTML%20Template&amp;summary=&amp;source="><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
						<hr>
						<div class="sidebar-widget" id="widget-contact">
							<h2>Contact</h2>
							<ul>
								<li><i class="fa fa-building"></i> B 100 A, South City 1</li>
								<li><i class="fa fa-map-marker"></i>Near Signature Tower</li>
								<li><i class="fa"></i>Gurgaon, Haryana - 122001, India</li>
								<li><i class="fa fa-phone"></i>91-124-4253759</li>
								<li><i class="fa fa-envelope"></i><a href="mailto:company@itsrecuritment.com">Send an email</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ CONTENT END ============ -->

		<!-- ============ CONTACT START ============ -->

	<?php include('include/footer.php'); ?>
		<!-- ============ REGISTER END ============ -->

		<!-- Modernizr Plugin -->
		<script src="js/modernizr.custom.79639.js"></script>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.11.2.min.js"></script>

		<!-- Bootstrap Plugins -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Retina Plugin -->
		<script src="js/retina.min.js"></script>

		<!-- ScrollReveal Plugin -->
		<script src="js/scrollReveal.min.js"></script>

		<!-- Flex Menu Plugin -->
		<script src="js/jquery.flexmenu.js"></script>

		<!-- Slider Plugin -->
		<script src="js/jquery.ba-cond.min.js"></script>
		<script src="js/jquery.slitslider.js"></script>

		<!-- Carousel Plugin -->
		<script src="js/owl.carousel.min.js"></script>

		<!-- Parallax Plugin -->
		<script src="js/parallax.js"></script>

		<!-- Counterup Plugin -->
		<script src="js/jquery.counterup.min.js"></script>
		<script src="js/waypoints.min.js"></script>

		<!-- No UI Slider Plugin -->
		<script src="js/jquery.nouislider.all.min.js"></script>

		<!-- Bootstrap Wysiwyg Plugin -->
		<script src="js/bootstrap3-wysihtml5.all.min.js"></script>

		<!-- Flickr Plugin -->
		<script src="js/jflickrfeed.min.js"></script>

		<!-- Fancybox Plugin -->
		<script src="js/fancybox.pack.js"></script>

		<!-- Magic Form Processing -->
		<script src="js/magic.js"></script>

		<!-- jQuery Settings -->
		<script src="js/settings.js"></script>


	</body>
</html>