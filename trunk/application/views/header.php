<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome to CodeIgniter</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/styles.css") ?>">
		<script type="text/javascript" src="<?php echo base_url("js/jquery_1_6_3.js") ?>"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('body').hide();
				$('body').fadeIn('slow');

				$("ul.subnav").parent().append("<span></span>");
				//Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)

				$("ul.topnav li a").mouseover(function() {
					//Following events are applied to the subnav itself (moving subnav up and down)
					$(this).parent().find("ul.subnav").slideDown('fast').show();
					//Drop down the subnav on click

					$(this).parent().hover(function() {
					}, function() {
						$(this).parent().find("ul.subnav").slideUp('fast');
						//When the mouse hovers out of the subnav, move it back up
					});
					//Following events are applied to the trigger (Hover events for the trigger)
				}).hover(function() {
					$(this).addClass("subhover");
					//On hover over, add class "subhover"
				}, function() {//On Hover Out
					$(this).removeClass("subhover");
					//On hover out, remove class "subhover"
				})

				$("ul.topnav li a").click(function() {//When trigger is clicked...

					//Following events are applied to the subnav itself (moving subnav up and down)
					$(this).parent().find("ul.subnav").slideDown('fast').show();
					//Drop down the subnav on click

					$(this).parent().hover(function() {
					}, function() {
						$(this).parent().find("ul.subnav").slideUp('fast');
						//When the mouse hovers out of the subnav, move it back up
					});
					//Following events are applied to the trigger (Hover events for the trigger)
				}).hover(function() {
					$(this).addClass("subhover");
					//On hover over, add class "subhover"
				}, function() {//On Hover Out
					$(this).removeClass("subhover");
					//On hover out, remove class "subhover"
				});
			});

		</script>
	</head>
	<body>
		<div id="header_image">
			header_image
		</div>
		<div id="menu-header">
						
			<ul class="topnav">
				<li>
					<?php echo anchor('', 'Página Inicial'); ?>
				</li>
				<li>
					<?php echo anchor('app', 'Aplicações'); ?>
					
				</li>
				<li>
					<a href="#">Tutorials</a>
					<ul class="subnav">
						<li>
							<a href="#">Sub Nav Link</a>
						</li>
						<li>
							<a href="#">Sub Nav Link</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Resources</a>
					<ul class="subnav">
						<li>
							<a href="#">Sub Nav Link</a>
						</li>
						<li>
							<a href="#">Sub Nav Link</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">About Us</a>
				</li>
				<li>
					<a href="#">Advertise</a>
				</li>
				<li>
					<a href="#">Submit</a>
				</li>
				<li>
					<a href="#">Contact Us</a>
				</li>
			</ul>
			
			</div>
		<div id="container">
