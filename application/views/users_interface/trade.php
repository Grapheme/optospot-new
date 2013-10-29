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
			<?php 
				$language = 'en_EN';
				if($this->language == 3):
					$language = 'ru_RU';
				endif;
			?>
			<?php if($this->loginstatus && $this->profile['demo'] == 0):?>
				<iframe style="width: 100%;" id="trade-wrapper" src="http://live.actforex.sysfx.com:8100/trade/trade.jsp?entry=deal.184&&lang=<?=$language;?>"></iframe>
			<?php else:?>
				<iframe style="width: 100%;" id="trade-wrapper" src="http://demo.actforex.sysfx.com:8100/trade/trade.jsp?entry=demo.184&lang=<?=$language;?>"></iframe>
			<?php endif;?>
			</div>
		</div>
		<div class="clear"></div>
		<div class="container_12 reg-blocks">
			<div class="grid_3 typical-menu">
				<nav>
					<ul>
						<li><a href="#" class="typical-link">Опционы ONE</a></li>
						<li><a href="#" class="typical-link">Touch</a></li>
						<li><a href="#" class="typical-link">Бинарные опционы</a></li>
						<li><a href="#" class="typical-link">Почему optospot</a></li>
						<li><a href="#" class="typical-link">Нащи особенности</a></li>
						<li><a href="#" class="typical-link">Техника трейдинга</a></li>
						<li><a href="#" class="typical-link"></a></li>
						<li><a href="#" class="typical-link"></a></li>
					</ul>
				</nav>
			</div>
			<div class="grid_6">
				<?=$content;?>
			</div>
			<div class="grid_3 typical-news">
				<div class="typical-news-in">
					<div class="typical-news-title"><img src="<?=baseURL();?>img/rbk.png"><p class="typical-link">Новости рбк</p></div>
					<a href="#" class="typical-news-item normal-text">Дмитрий Панкин предподнес прощальный подарок финансистам</a>
					<a href="#" class="typical-news-item normal-text">Дмитрий Панкин предподнес прощальный подарок финансистам</a>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<?php $this->load->view("users_interface/modal/signin");?>
	<div class="dark-screen"></div>
	<?php $this->load->view("users_interface/includes/footer");?>
	<?php $this->load->view("users_interface/includes/scripts");?>
	<?php $this->load->view("users_interface/includes/analytics");?>
</body>
</html>