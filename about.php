
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    	
	<!-- Todo 
  -->
    
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>EventLink - About</title>

	<!-- Mobile Specific
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css"  href="css/style.css">

	
	
	<!-- Web Fonts
  ================================================== -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	<!-- JS
  ================================================== -->
      
	<script type='text/javascript' src="js/jquery-1.7.2.min.js"></script>
	<script type='text/javascript' src="js/custom.js"></script>
	<script type='text/javascript' src="js/shortcodes.js"></script>
	<script type='text/javascript' src="js/custom2.js"></script> <!-- Added by MN July 2012 -->	
	
      
	


</head>
<body>

	<!-- Primary Page Layout
	================================================== -->


<?php include("header.html"); ?>  
    
	<!-- Page Subtitle -->
	<div id="subtitle">
		<!-- 960 Container -->
		<div class="container">
  			<div class="sixteen columns">
				<h3>About</h3>
			</div>
		</div>
		<!-- End 960 Container -->
	</div><!-- End Page Subtitle -->	 
       

	

	
	<!-- 960 Container -->
	<div class="container">
		
			<!-- Text -->
			<div class="sixteen columns">
				<h3 class="page_headline">What is EventLink?</h3>
<p class = "bigger">EventLink is an app that allows you to see the detailed profile information of everyone attending an event. This helps you figure out which events you need to attend and who you should meet once there. It even helps you message these people before, during and after the event.</p> 
<br>
<p class = "bigger">Currently it pulls profile information from <a href = "http://LinkedIn.com" target="_blank"><strong>LinkedIn</strong></a> and event listings from <a href = "http://Meetup.com" target="_blank"><strong>Meetup.com</strong></a> (although more sources are coming soon.)</p>   
<br>
<p class = "bigger">EventLink works great on a desktop and any mobile device. Just point your browser to our <a href = "./">home page</a>.</p>
<br>
<p class = "bigger">The app has been developed by <a href = "http://CrowdLinker.com" target="_blank"><strong>CrowdLinker</strong></a>. Expect more great features in the near future.</p> 
<br>
<p class = "bigger">Visit <a href = "http://CrowdLinker.com" target="_blank"><strong>CrowdLinker.com</strong></a> to see our promo video and learn more about us.</p>
<br>
<br>
			</div>
			
	
	
	</div>
	<!-- End 960 Container -->
		
        



<?php include("footer.html"); ?>	

		
		<!-- Back To Top Button -->
		<div id="backtotop"><a href="#"></a></div>


  <!-- Google Analytics Tracking -->
  <script type="text/javascript">
  
//jQuery(document).ready(function() {  
  
//<!-- Original Google Analytics Tracking -->
/*
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32096884-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
*/  
//<!-- End of Original Google Analytics Tracking -->  

// original Google Analytics Code  
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32096884-2']);
  _gaq.push(['_trackPageview']);

// Init variables for custom anlytics tracking  
  var memberName = "set";
  var memberID = "set";

function runAnalytics ( memberName,  memberID, _gaq) { // must still be run!
       // Custom Anlytics Variables
      _gaq.push(['_setCustomVar',
            1,                // This custom var is set to slot #1.  Required parameter.
            'Member-ID',    // The name of the custom variable.  Required parameter.
            memberID,        // The value of the custom variable.  Required parameter.
            1                 // Sets the scope to visitor-level.  Optional parameter.
       ]);     
       // Custom Variables
      _gaq.push(['_setCustomVar',
            2,                // This custom var is set to slot #2.  Required parameter.
            'Member-Name',    // The name of the custom variable.  Required parameter.
            memberName,        // The value of the custom variable.  Required parameter.
            1                 // Sets the scope to visitor-level.  Optional parameter.
       ]);       
       
      // Google Analytics - Setup of Their Script    
      //(function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      //})();  

    } // end of runAnalytics


  
  //<!-- Visitor Log -->	(Analyics run in here.)	

	//jQuery(document).ready(function() {      //---------(set above)
	  currentURL =  jQuery(location).attr('href');
	  encodedCurrentURL = mySafe( encodeURIComponent(currentURL));
	
    jQuery.ajax({
        url: './backend/log-visitor.php', 
        data: { action: encodedCurrentURL }, 
        dataType: 'json', 
        timeout: 10000, 
        success: function(data)          //on recieve of reply
        {   
          var memberName = mySafe(data['firstName'], "unknown") + " " + mySafe(data['lastName'], "unknown");
          var memberID = mySafe(data['id'], "unknown");
          runAnalytics(memberName, memberID, _gaq);           
        },
        error: function()
        {
          runAnalytics('error', 'error', _gaq);
        }         
    }); // end of ajax	
    
//  }); // end of jquery section
  
  </script>		

    <!-- ShareThis code -->
  <script type="text/javascript">var switchTo5x=false;</script>
  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
  <script type="text/javascript">stLight.options({publisher: "a6c327a8-1c4a-4e29-980a-fe4f4fa675d5"}); </script>          


	
	
		
</body>
</html>