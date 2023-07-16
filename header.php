<?php
	ini_set("error_reporting", 1);
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	if($_GET['rel']!='tab'){
?>
<html>
<head>
	<title>Change content and URL without refreshing page in ajax - jquery - php</title>
	<style>
		body{background:url(bg.jpg);}
		*{margin:0px; padding:0px; font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;}
		#menu{font-size:20px;width:100%; height:60px; background:rgba(212,212,212,0.6); text-align:center;}
		#menu a{line-height:2em; font-size:24px; text-decoration:none; color: #fff; font-weight:bold}
		h1 {font-family: Helvetica, Arial, sans-serif;  text-align: center;text-shadow: 2px 2px 0px rgba(255,255,255,.7), 5px 7px 0px rgba(0, 0, 0, 0.1);  font-size:60px; color:#fff; line-height:8em;}
		.page { width:100%; height:550px; }
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(function(){
			$("a[rel='tab']").click(function(e){
				pageurl = $(this).attr('href');
				$.ajax({url:pageurl+'?rel=tab',success: function(data){
					$('#content').html(data);
				}});
				if(pageurl!=window.location){
					window.history.pushState({path:pageurl},'',pageurl);	
				}
				return false;  
			});
		});
		$(window).bind('popstate', function() {
			$.ajax({url:location.pathname+'?rel=tab',success: function(data){
				$('#content').html(data);
			}});
		});
	</script>
</head>
<body>
<div id='menu'>
	<a rel='tab' href='index.php'>Home</a> | |
	<a rel='tab' href='about-us.php'>About Us</a> | |
	<a rel='tab' href='contact-us.php'>Contact Us</a>
</div>
<div id='content'>
<?php } ?>