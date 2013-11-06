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
		<div class="container_12 reg-blocks">
			<form action="<?=site_url('signup-account');?>" method="POST">
				<div class="grid_12"><h1 class="reg-title"><?=$this->localization->getLocalButton('signup','form_title');?></h1></div>
				<div class="grid_4 reg-block" id="reg-1">
					<div class="reg-block-in">
						<div class="reg-blocks-title">
							<img src="<?=baseURL('img/red-1.png');?>">
							<h2><?=$this->localization->getLocalButton('signup','fill')?></h2>
						</div>
						<div class="clear"></div>
						<input type="hidden" value="xml" name="answerType">
						<input type="hidden" value="send" name="act">
						<input type="hidden" value="main" name="office">
						<div class="input-container"><input class="begin-input input-fname" name="fname" value="" type="text" placeholder="<?=$this->localization->getLocalPlaceholder('signup','fname')?>" id="name"></div>
						<div class="input-container"><input class="begin-input input-lname" name="lname" value="" type="text" placeholder="<?=$this->localization->getLocalPlaceholder('signup','lname')?>" id="lastname"></div>
						<div class="input-container"><input class="begin-input input-email" name="email" value="" type="text" placeholder="<?=$this->localization->getLocalPlaceholder('signup','email')?>" id="email"></div>
						<div class="input-container" id="country-div">
							<?php $this->load->view('html/select-countries');?>
						</div>
						<button class="red-button reg-block-button" id="button-1"><?=$this->localization->getLocalButton('signup','next')?></button>
					</div>
				</div>
				<div class="reg-circle" id="circle-2">
					<p class="circle-number">
						2
					</p>
					<div class="circle-line"></div>
					<h2><?=$this->localization->getLocalButton('signup','choice_type_account')?></h2>
				</div>
				<div class="grid_4 reg-block" id="reg-2" style="display:none;">
					<div class="reg-block-in">
						<div class="reg-blocks-title">
							<img src="<?=baseURL('img/red-2.png');?>">
							<h2><?=$this->localization->getLocalButton('signup','choice_type_account')?></h2>
						</div>
						<div class="clear"></div>
						<a href="#" class="score blue">
							<div class="score-in">
								<h2 class=""><?=$this->localization->getLocalButton('signup','demo_account');?></h2>
								<div class="circle-line"></div>
								<p class="normal-text"><?=$this->localization->getLocalButton('signup','demo_account_text');?></p>
							</div>
						</a>
						<a href="#" class="score green">
							<div class="score-in">
								<h2><?=$this->localization->getLocalButton('signup','real_account');?></h2>
								<div class="circle-line"></div>
								<p class="normal-text"><?=$this->localization->getLocalButton('signup','real_account_text');?></p>
							</div>
						</a>
						<div class="hidden">
							<input type="radio" name="account_type" value="1" class="acc-radio">
							<input type="radio" name="account_type" value="2" class="acc-radio">
						</div>
					</div>
				</div>
				<div class="reg-circle" id="circle-3">
					<p class="circle-number">
						3
					</p>
					<div class="circle-line"></div>
					<h2><?=$this->localization->getLocalButton('signup','by_register');?></h2>
				</div>
				<div class="grid_4 reg-block" id="reg-3" style="display: none;">
					<div class="reg-block-in">
						<div class="reg-blocks-title">
							<img src="<?=baseURL('img/red-3.png');?>">
							<h2><?=$this->localization->getLocalButton('signup','by_register');?></h2>
						</div>
						<div class="clear"></div>
						<p class="reg-desc normal-text">
							<?=$this->localization->getLocalButton('signup','by_register_text');?>
						</p>
						<div class="div-form-operation">
							<button class="red-button reg-block-button steps-signup-submit" id="button-3"><?=$this->localization->getLocalButton('signup','begin_trading');?></button>
						</div>
					</div>
				</div>
			</form>
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