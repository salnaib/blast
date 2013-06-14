<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>CrowdLinker - Back-End Developer</title>
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css"  href="css/fcbklistselection.css">
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/keywords.js?id=ffff"></script>
<script type="text/javascript" src="js/fcbklistselection.js?id=dgggg"></script>

<script type="text/javascript" src="http://platform.linkedin.com/in.js">
	api_key: 5qqx1bqhksrg
	//  scope:r_network,w_messages,rw_nus rw_groups,r_contactinfo,r_emailaddress,r_fullprofile r_basicprofile
	scope:r_network,w_messages
	authorize: false
credentials_cookie: true
	onLoad: onLinkedInLoad
</script>
<!-- NOTE: be sure to set onLoad: onLinkedInLoad -->

<script type="text/javascript">
/*******************************************************************/
var ctr=0;   //connection counter
var max_selection = 100;
var max_selection_msg=100;
var bw=10;  //number of people in a group message
var user_id="";
var crem=0;
var user_fname='';
var user_lname='';
/********************************************************************/
function onLinkedInLoad() {
	$('a[id*=li_ui_li_gen_]')            
    .css({marginBottom:'20px'}) //change the buttom           
	.html('<span class="linkeinbtn"><img alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANMAAAAdCAIAAAC/h85KAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpDMDhERUJDQzUyN0RFMDExQkIwREEwNEQyOTU0N0I4MiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowRjM1RDUyMTUyOEExMUUyOUExN0E0OEM0QzMzNkI3QSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowRjM1RDUyMDUyOEExMUUyOUExN0E0OEM0QzMzNkI3QSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChNYWNpbnRvc2gpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDE4MDExNzQwNzIwNjgxMTgwODNGOTk4MEY1N0M5MkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QzA4REVCQ0M1MjdERTAxMUJCMERBMDREMjk1NDdCODIiLz4gPC9yZGY6RGVzY3Jp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" /></span>');    
     IN.Event.on(IN, "auth", function() {onLinkedInLogin();});
     IN.Event.on(IN, "logout", function() {onLinkedInLogout();});
}
/********************************************************************/
function onLinkedInLogout() {
  setConnections({}, {total:0});
}
/********************************************************************/
function onLinkedInLogin() {
	$(".sendmsg").addClass("hidden");	
	// here, we pass the fields as individual string parameters
	$("#counter").html(ctr);
	$(".linkein_txt").addClass("hidden");
	$(".top_message").addClass("hidden");
	
	document.getElementById("connectionsdata").innerHTML="<span class='loader'><img src='images/ajax_loader_gray_48.gif'></span>";
	IN.API.Connections("me")
	.fields("id", "firstName", "lastName", "pictureUrl", "publicProfileUrl","headline","location")
	.result(function(result, metadata) {
		setConnections(result.values, metadata);
	});
	
	IN.API.Profile("me")  
		.fields("id", "firstName", "lastName", "pictureUrl", "publicProfileUrl","headline")	
		.result(function(result, metadata) {
			myprofile(result.values, metadata);
	})
}
/********************************************************************/
function fomartTimeShow(h_24) {
    var t=h_24.split(":");
	var h = t[0] % 12;
    if (h === 0) h = 12;
    return (h < 10 ? "0" + h : h) + ":" +t[1] + (t[0] < 12 ? 'am' : 'pm');
}
/********************************************************************/
function alreadyMesseged(){
	 $('#fcbklist').hide();
	 $('._loader').show();
	 $.post('mpp.php',{id:user_id},
		function(data){
		var d = JSON.parse(data);
		var c = d.length;	
		crem = c;
		if ( c ) 	
		$(".unhide").removeClass("hidden").show();
		for(i=0;i<c;i++){
			$(".name"+d[i].recipient_id).addClass("gray");
			$(".imsg"+d[i].recipient_id).html("Already messaged");
			 if($("[rel='"+d[i].recipient_id+"']").hasClass("liselected")){
				cn= $("#view_selected_count").text();
				$("#view_selected_count").text(cn-1);
			}			
			$(".ifs"+d[i].recipient_id).removeClass("itemselected");
			$("[rel='"+d[i].recipient_id+"']").addClass("already_messged").attr("addedid", "").removeClass("liselected ").addClass("hidden").hide();			
		}
		if ( c <= 1 )		
			$(".cr").html(" "+parseInt(c)+" connection");			
		else
			$(".cr").html(" "+parseInt(c)+" connections");				
	    $('#fcbklist').show();			
		$('._loader').hide();		
	 });
}
/********************************************************************/
function warnning(){
   $.post('gd.php',{id:user_id},function(data){
		var d = JSON.parse(data);
		var c = d.total;	
		var _tt=d.time;		
		if( c ){
			max_selection=max_selection_msg-c;
			pps= ( c == 1 ) ? 'person' :'people';
			$(".warn").html("You have already messaged "+c+" "+pps+" out of "+max_selection_msg+" within the past 24 hours. You can now message a maximum of "+ max_selection +" people until the cap is reset back to "+max_selection_msg+" at "+fomartTimeShow(_tt)+" tomorrow.<br>");
		}		
	});
}
/********************************************************************/
function myprofile(profile){
	user_id=profile[0].id;
	user_fname=profile[0].firstName;
	user_lname=profile[0].lastName;
 $.post('savetoken.php', { "name" : user_fname + ' ' + user_lname });
	$(".welcome").html(
		<!-- "<img src="+profile[0].pictureUrl+" width='110'><br>"+ -->
		"<span class='top_messages'>Hi <span class='metaname hidden' rel='"+profile[0].id+"'>"+profile[0].firstName+" "+profile[0].lastName+"</span> <span class='my_name' rel='"+profile[0].id+"'>"+profile[0].firstName+",<p>"+
		"Below, we have already pre-selected some of your <span class='sctr'></span> contacts we believe might be interested in our job opening or probably know someone who is. Please feel free to pick whoever you would like to message by clicking on their profiles. Please keep in mind that you can only message up to a maximum of 100 people within 24 hours.</p><p>CrowdLinker is looking for a Back-End web developer proficient in PHP, SQL, Javascript and jQuery. We are offering a $250 referral fee to whomever refers a successful candidate. (Refer your LinkedIn contact by selecting them below or email us at <a href='mailto:contact@crowdlinker.com'>contact@crowdlinker.com</a>.) Find the full job posting <a href='http://ca.indeed.com/cmp/CrowdLinker-Inc./jobs/Lead-Back-End-Developer-ec737ad3c20c1f3d' target='_blank'>here</a>.</p></span><span class='warn'></span>"
	);
	warnning();
}
/********************************************************************/
function getSelection(){
	var n =0;
	res='{ "values":[';
	for ( i = 0 ; i < ctr; i++ )
		if ( $("li.cs"+i).hasClass("liselected") ){
			token = $(".cs"+i).attr('rel');
			res =res+'{ "token":"' +$(".cs"+i).attr('rel')+'",';		
			res =res+'"name":"'+$(".name"+token).html()+'" },';
			n++;
		}			
	res = res.slice(0,res.length-1);
	res=res+'],';
	res=res+ '"_total":'+n+' }';
	if ( !n  )
		return '';
	return res;
}
/********************************************************************/
function sendBundleMsg(){
  var ppls = getSelection();
  var people = jQuery.parseJSON(ppls);
  var totalppl = people["_total"];
  var pplcount = ( totalppl <= max_selection ) ? totalppl : ip;
  var i = j= 0;
  var pnn = pnp = '';
  while(i <pplcount){
     do{
		if ( i < pplcount ) {
		  pnp = pnp +people["values"][i].token+',';		  
		  pnn = pnn +people["values"][i].name+',';
		 }
		j++;i++;		
	}while(j < bw);
	pnp = pnp.slice(0,pnp.length-1);	
	$(".msgcenter").hide();
	$(".sending").removeClass("hidden");
	SendMessage(pnp,pnn);
	pnn=pnp='';
	j = 0;
  }
} 
/********************************************************************/
function SendMessage(ppls,pnn) { 
	 var message = document.getElementById('message').value; 
	 var subject = document.getElementById('subject').value;  	   
	 var ppl10=ppls.split(',');
	 var pplcount= ( ppl10.length < 10 ) ? ppl10.length : 10;  //ppls (comma seperated string) should be up to 10 the first 10 pepole will give
	 var s = '{"recipients":{ "values": [';	 
 	// s = s+ '{"person": {"_path": "/people/~"}},';
	 for (i = 0 ; i < pplcount ; i++)
		if	(ppl10[i] != "private"){
			s = s+ '{"person": {"_path": "/people/'+ppl10[i]+'"}},';
		}
	 s = s.slice(0,s.length-1);
	 s = s+ ']}, "subject": "'+subject+'", "body": "'+message+'"}';	

	 var BODY = jQuery.parseJSON(s);
	// var BODY = "{}";
     IN.API.Raw("/people/~/mailbox")
	   .method("POST")
	   .body(JSON.stringify(BODY)) 
	   .result(function(result, metadata) {
				getMR(result.errorCode, result.message,ppls,pnn);})
	   .error(function(result, metadata) {
				getErr(result.errorCode, result.message,ppls,pnn);})
	$("#sendMessageForm").addClass("hidden");
	$(".sendmsg").addClass("hidden");
 }
 /********************************************************************/
 function getErr(code,msg,ppls,pnn) {
	$(".status").removeClass('hidden');
	$(".status").addClass("err");
	$("#contents").addClass("hidden");
	$("#errMsg").html("<p class='confirmationerror'>LinkedIn caps the number of contacts you can message within 24 hours at 100. According to our records you have already messaged 100 of your LinkedIn contacts within the past 24 hours.<p>");
	$('html, body', window.parent.document).animate({scrollTop:0}, 'slow'); 
}
/********************************************************************/
function goBack(){
	$(".msgcenter").show();
	$(".sending").addClass("hidden");	
	$("#errMsg").html("");
	$("#contents").removeClass("hidden");
	$("#sendMessageForm").removeClass("hidden");
	$(".sendmsg").removeClass("hidden");
	unselectAll();	
	warnning();
	alreadyMesseged();
	$('#filterSearchBox').val('');
	filter('.listitems:not(.already_messged)', '');	
	$(".unhide").removeClass("hidden").show();
	$(".htext").html("Unhide");
	return false;
}
/********************************************************************/
 function getMR(code,msg,ppls,pnn) {
	$(".sent").removeClass('hidden');
	mpfn = $(".metaname").html();
	mpid = $(".metaname").attr("rel");
	$.post("imsg.php",{pnp:ppls,pnn:pnn,mpfn:mpfn,mpid:mpid},function(data){
		$("#contents").addClass("hidden");
		$("#errMsg").html("<p class='confirmationaccept'>Your messages have been sent!</b></p><p class='confirm'><br>Thank you for letting your LinkedIn contacts know about the NYC VC & Angel Showcase.<br>We are looking forward to seeing you there!<br><br><a href='#' onclick='return goBack();'>Message more people</a></p>");
		$('html, body', window.parent.document).animate({scrollTop:0}, 'slow'); 				
	});	
 }
/********************************************************************/
function selectRec(){
	if ( !max_selection  ){
		alert("You have already messaged "+max_selection_msg+" people out of "+max_selection_msg+" within the past 24 hours.");
		return;
	}
	$("li").removeClass("liselected");
	$(".fcbklist_item").removeClass("itemselected");
	$("li").removeAttr("addedid");		
	$("#view_selected_count").text("0");			
     
	var keywords = srchkw.toLowerCase().split(",");
	var r = 0 , c = 1 ;
	var country_code="";
	for( i = 0 ; i < ctr ; i++ ){
		srch = $(".cs"+i).attr("search").toLowerCase();		
		if ( $(".cs"+i).attr("country_code") ) 
			country_code = $(".cs"+i).attr("country_code").toLowerCase();
		else
			country_code="";
		r=0;
		if (country_code ==  "us" && !$(".cs"+i).hasClass("already_messged")){
			for ( j = 0 ; j < keywords.length ; j++)
				if ( srch.search(keywords[j]) >=0){
				  r = 1;
				 }
			if( r ) {
				$("li.cs"+i).addClass("liselected").attr("addedid", "tester");;
				$(".fs"+i).addClass("itemselected");
				$("#view_selected_count").text(c++);			
			}
		}
		if ( c > max_selection)
			return;
	}	
}
/**********************************************************************/
 //filter results based on query
function filter(selector, query) {
	query	=	$.trim(query); //trim white space
	query = query.replace(/ /gi, '|'); //add OR for regex
	$(selector).each(function() {
	  ($(this).text().search(new RegExp(query, "i")) < 0) ? $(this).hide() : $(this).show();
});
}          
/**********************************************************************/
function unselectAll(){
	$("li").removeClass("liselected");
	$(".fcbklist_item").removeClass("itemselected");
	$("li").removeAttr("addedid");		
	$("#view_selected_count").text("0");			
}
/**********************************************************************/
function selectAll(){
	if ( !max_selection  ){
		alert("You have already messaged "+max_selection_msg+" people out of "+max_selection_msg+" within the past 24 hours.");
		return;
	}
	var n =1;
	var k=false;
	for( i = 0 ; i < ctr ; i++ ){
		k = $(".cs"+i).hasClass("already_messged")
		if( k == false ){
			$(".cs"+i).addClass("liselected").attr("addedid", "tester");
			$(".fs"+i).addClass("itemselected");	
			$("#view_selected_count").text(n++);			
		}
		if (n > max_selection) 
			return;
	}
}
/********************************************************************/
function setConnections(connections) {
	var connHTML = "<form action='' method='post'><ul id='fcbklist'>";
	for (id in connections) {	  
	    if ( connections[id].hasOwnProperty('location') )
			connHTML = connHTML + "<li rel='"+connections[id].id+"' search='"+connections[id].location['name']+"' country_code='"+connections[id].location['country'].code+"' class='"+"cs"+ctr+" listitems' >";
	    else
			connHTML = connHTML + "<li rel='"+connections[id].id+"' search='' country_code='' class='"+"cs"+ctr+" listitems' >";		
		connHTML = connHTML + "<div class='fcbklist_item fs"+ctr+" ifs"+connections[id].id+" '><table border='0' width=\"100%\"><tr>";
		if (connections[id].hasOwnProperty('pictureUrl')) {
		  connHTML = connHTML + "<td width='52px' rowspan='2'> <img align=\"baseline\" src=\"" + connections[id].pictureUrl + "\" width=\"55px\" ></td>";
		}  else {
		  connHTML = connHTML + "<td width='52px' rowspan='2'><img align=\"baseline\" src=\"images/icon_no_photo_80x80.png\" width=\"48px\"></td>";
		}
		connHTML = connHTML + "<td height='35px'><span id='names_item' class='name"+connections[id].id+"' >" +connections[id].firstName + " " + connections[id].lastName + "</span></td></tr><tr>";	
		connHTML = connHTML + "<td><span class='imsg"+connections[id].id+" sgray'></span></td></tr></table></div></li>";		
		ctr++;
	}
	$('.sctr').html(ctr);
	connHTML = connHTML + "</ul></form>" ;
	document.getElementById("connectionsdata").innerHTML = connHTML;
	var div = document.getElementById("sendMessageForm");
	//div.innerHTML +='<p class="unhide">Unhide '+"<span class='cr'>0</span>"+' connections I\'ve already messaged.</p>';
	div.innerHTML += '<br><form action="javascript:SendMessage("");">' +
		  '<div class="msgcenter"><label>Subject</label><input id="subject" size="50" value="Job Opening: Web Developer, $250 referral (CrowdLinker Inc)" type="text"><br><br>' +
		  '<label>Message</label><textarea  id="message">'+
												'CrowdLinker Inc. is looking for a Back-End web developer (PHP, SQL, Javascript and jQuery.) They are offering a $250 referral fee to anyone who refers a successful candidate. If you or anyone you know is interested, visit http://crowdlinker.com/cljob10 for details. You can also use the page to automatically refer your LinkedIn contacts that might be a good fit. (I used it to send you this message.)</textarea></form></div>';											

	$("#connectionstest").removeClass("hidden");	
	$(".search").removeClass("hidden");
	$(".sendmsg").removeClass("hidden");
	$.fcbkListSelection("#fcbklist","557","60","7");	
	selectRec(); //select recommended pepole
	alreadyMesseged();	
	
}
</script>

</head>
<body>

	<?php include("header.html"); ?>

		<div id="errMsg"></div>
		<div id="contents">
		<p class="page_title">CrowdLinker - Back-End Developer</p>
		<p class="top_message">Let your contacts know about our opening for a Back-End Web Developer by messaging them on LinkedIn. 
      Earn a $250 referral fee. Use this web-page to easily message the right contacts.
    </p>
		<span class="welcome"></span>
		<script type="IN/Login"></script>
		<div class="linkein_txt">
				Clicking on the "Message my LinkedIn contacts" button will allow you to send a personalized message to each of your LinkedIn contacts. 
        We will automatically pre-select your contacts that are most appropriate to send this message to.
        
		</div>
		
		<div id="connectionstest" class="hidden">
			<!-- <a href="#" onclick="IN.User.logout(); return false;">logout</a>  -->
			<a id="selectall" ><img src="images/select-all.png?id=n100"></a> 
			<a id="unselectall" ><img src="images/unselect-all.png?id=n100"></a>		
			<a id="selectrec" ><img src="images/select-recommended.png?id=n100"></a>
		</div>

		<br>	
		<div class="search hidden"><span>Search : </span><input type="text" name="filterSearchBox" id="filterSearchBox" /></div>
		
		<span class="sctr hidden"></span>
		<div class="_loader hidden"><img src="images/ajax_loader_gray_48.gif?id=n100"></div>
		<div id="connectionsdata"></div>
		<p class="unhide hidden"><span class="htext">Unhide</span><span class='cr'> 0 </span> I've already messaged</p>
		<div id="sendMessageForm"></div>
		<span class="sending hidden"><img src="images/ajax_loader_gray_48.gif?id=n100"></span>
		<br>
		<a class='sendmsg msgcenter hidden'><img src="images/send-message.png?id=n100"></a>
		</div>
		<div id="messages">
				<div class="status hidden"></div>
				<div class="sent hidden"></div>	
		</div>
	
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-32096884-2']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>

<?php include("footer.html"); ?>

</body>
</html>


<script type="text/javascript" language="JavaScript">
$(document).ready(function() {
  $('html, body', window.parent.document).animate({scrollTop:0}, 'slow'); 				
  $('#filterSearchBox').val('');
  $('#filterSearchBox').focus();
  
  $(".unhide").click(function(){
		if ( !$(this).hasClass("hide") ){
			$("li:not(#view_unselected)").removeClass("hidden").show();
			$(this).addClass('hide');
			$(".htext").text("Hide");
		}else{
			$(".already_messged").addClass("hidden").hide();
			$(this).removeClass('hide');
			$(".htext").text("Unhide");			
		}
	filter('.listitems:not(.hidden)', $('#filterSearchBox').val());		
  });
 
 $("#selectall").click(function(){
		unselectAll();		
		selectAll();
		$('#filterSearchBox').val('');
		filter('.listitems:not(.hidden)', $(this).val());
		
  });

  $("#unselectall").click(function(){
		unselectAll();
		$('#filterSearchBox').val('');
		filter('.listitems:not(.hidden)', $(this).val());

  });

  $("#selectrec").click(function(){
		selectRec();
		$('#filterSearchBox').val('');
		//$('.listitems').removeClass('hidden'); //we want each row to be visible when escabled
		filter('.listitems:not(.hidden)', $(this).val());
  });
  
  
  $('.sendmsg').click(function(){

		if ( !max_selection  ){
			alert("You have already messaged "+max_selection_msg+" people out of "+max_selection_msg+" within the past 24 hours.");
			return;
		}  

		var selected = parseInt($("#view_selected_count").text());	
		if ( !selected ){
			alert("Please select your connection(s)");
			return;
		}
		if( selected > max_selection ){
			alert("You can only message up to a maximum of 100 people.");
			return;
		}
		sendBundleMsg();		
	});

	$('#filterSearchBox').blur(function(event) {
		filter('.listitems:not(.hidden)', $(this).val());
	});

	$('#filterSearchBox').focus(function(event) {
		filter('.listitems:not(.hidden)', $(this).val());
	});          	

	$('body').keyup(function(event) {
		//if esc is pressed or nothing is entered
	if (event.keyCode == 27  ) {
			//if esc is pressed we want to clear the value of search box
		$('#filterSearchBox').val('');
		//$('.listitems').removeClass('hidden'); //we want each row to be visible when escabled
		filter('.listitems:not(.hidden)', $(this).val());
	}
	});
	
	$('#filterSearchBox').keyup(function(event) {
		//if esc is pressed or nothing is entered
	if (event.keyCode == 27  ) {
			//if esc is pressed we want to clear the value of search box
		$(this).val('');
		$('.listitems:not(.already_messged)').removeClass('hidden'); //we want each row to be visible when escabled
		filter('.listitems:not(.hidden)', $(this).val());
	}
		//if there is text, lets filter
		else {
		filter('.listitems:not(.hidden)', $(this).val());
	}
	});	
	
	
});	  
</script>