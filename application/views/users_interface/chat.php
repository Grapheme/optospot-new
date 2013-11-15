<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php $this->load->view("users_interface/includes/head");?>
</head>
<body>
	<?php $this->load->view("users_interface/includes/ie7");?>
	<?php $this->load->view("users_interface/includes/header");?>
	<div class="award-container">
		<h1 class="award-title">Forex Expo Awards 2013</h1>
	</div>
	
	<div class="container_12">
		
	</div>
	<script>
		(function(){
		// your widget ID
		var widget_id = 650970;
		_shcp =[{widget_id : widget_id}];
		// set default language
		var lang =(navigator.language || navigator.systemLanguage
		|| navigator.userLanguage ||"en")
		.substr(0,2).toLowerCase();
		// script url
		var url ="widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
		var hcc = document.createElement("script");
		hcc.type ="text/javascript";
		hcc.async =true;
		hcc.src =("https:"== document.location.protocol ?"https":"http")
		+"://"+ url;
		var s = document.getElementsByTagName("script")[0];
		s.parentNode.insertBefore(hcc, s.nextSibling);
		})();
	</script>
	<div class="clear"></div>
	<?php $this->load->view("users_interface/modal/signin");?>
	<div class="dark-screen"></div>
	<?php $this->load->view("users_interface/includes/footer");?>
	<?php $this->load->view("users_interface/includes/scripts");?>
	<?php $this->load->view("users_interface/includes/analytics");?>
	<?php $this->load->view("users_interface/includes/metrika");?>
</body>
</html>