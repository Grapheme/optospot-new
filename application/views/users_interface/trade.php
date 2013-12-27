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
	<div class="main-container">
		<div class="container_12">
			<div class="grid_12">
			<h1><?=$this->localization->getLocalMessage('trade','title')?></h1>
			<p style="text-align: center;"><?=$this->localization->getLocalMessage('trade','loading-text')?></p>
			<?php 
				$language = 'en_EN';
				if($this->language == 3):
					$language = 'ru_RU';
				endif;
			?>
			<?php if($this->loginstatus && $this->profile['demo'] == 0):?>
				<iframe id="trade-wrapper" src="http://live.actforex.sysfx.com:8100/trade/trade.jsp?entry=deal.184&&lang=<?=$language;?>"></iframe>
			<?php elseif($this->loginstatus && $this->profile['demo'] == 1):?>
				<iframe id="trade-wrapper" src="http://demo.actforex.sysfx.com:8100/trade/trade.jsp?entry=demo.184&lang=<?=$language;?>"></iframe>
			<?php else:?>
				<iframe id="trade-wrapper" src="http://live.actforex.sysfx.com:8100/trade/trade.jsp?entry=deal.184&lang=<?=$language;?>"></iframe>
			<?php endif;?>
			</div>
		</div>
		<div class="clear"></div>
		<div class="container_12 reg-blocks">
			<?=$content;?>
		</div>
	</div>
	<div class="clear"></div>
	<?php $this->load->view("users_interface/modal/signin");?>
	<div class="dark-screen"></div>
	<?php $this->load->view("users_interface/includes/footer");?>
	<?php $this->load->view("users_interface/includes/scripts");?>
	<?php $this->load->view("users_interface/includes/analytics");?>
	<?php $this->load->view("users_interface/includes/metrika");?>
</body>
</html>