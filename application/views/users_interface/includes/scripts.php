<?php 
if($this->language_url == "ru") {
	$chat_lang = "ru";
} else
	{
		$chat_lang = "en";
	} 
?>
<script>
	(function(){
	// your widget ID
	var widget_id = 650964;
	_shcp =[{widget_id : widget_id}];
	// set default language
	var lang =("<?=$chat_lang;?>")
	.substr(0,2).toLowerCase();
	// script url
	var url ="widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
	var hcc = document.createElement("script");
	hcc.type ="text/javascript";
	hcc.async = true;
	hcc.src =("https:"== document.location.protocol ?"https":"http")
	+"://"+ url;
	var s = document.getElementsByTagName("script")[0];
	s.parentNode.insertBefore(hcc, s.nextSibling);
	})();
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?=baseURL('js/vendor/jquery-1.10.2.min.js');?>"><\/script>')</script>
<script src="<?=baseURL('js/vendor/jquery.liMarquee.js');?>"></script>
<script src="<?=baseURL('js/vendor/jquery-selectify.js');?>"></script>

<script type="text/javascript" src="<?=baseURL('js/vendor/bootstrap.tooltips.js');?>"></script>
<script type="text/javascript" src="<?=baseURL('js/vendor/jquery.form.js');?>"></script>
<script type="text/javascript" src="<?=baseURL('js/libs/localize.js');?>"></script>
<script type="text/javascript" src="<?=baseURL('js/libs/base.js');?>"></script>
<script type="text/javascript" src="<?=baseURL('js/cabinet/guest.js');?>"></script>

<script src="<?=baseURL('js/plugins.js');?>"></script>
<script src="<?=baseURL('js/main.js');?>"></script>