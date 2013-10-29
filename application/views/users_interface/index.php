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
			<div class="grid_12" style="text-align: center;">
				<div class="top-circle">
					<div>
						<p class="circle-number">1</p>
						<p class="circle-line"></p>
						<h2 class="circle-title"><?=$this->localization->getLocalMessage('index','circle_step1_1')?></h2>
						<p class="circle-description normal-text"><?=$this->localization->getLocalMessage('index','circle_step1_2')?></p>
					</div>
				</div>
				<div class="top-circle-arrow">&nbsp;</div>
				<div class="top-circle">
					<div>
						<p class="circle-number">2</p>
						<p class="circle-line"></p>
						<h2 class="circle-title"><?=$this->localization->getLocalMessage('index','circle_step2_1')?></h2>
						<p class="circle-description normal-text"><?=$this->localization->getLocalMessage('index','circle_step2_2')?></p>
					</div>
				</div>
				<div class="top-circle-arrow">&nbsp;</div>
				<div class="top-circle">
					<div>
						<p class="circle-number">3</p>
						<p class="circle-line"></p>
						<h2 class="circle-title"><?=$this->localization->getLocalMessage('index','circle_step3_1')?></h2>
						<p class="circle-description normal-text"><?=$this->localization->getLocalMessage('index','circle_step3_1')?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="begin-container">
		<div class="container_12">
			<div class="grid_8" id="screen-1">
				<div class="begin-list">
					<img src="<?=baseURL('img/red-1.png');?>"><p><?=$this->localization->getLocalMessage('index','screen1_1')?></p>
				</div>
				<div class="begin-list">
					<img src="<?=baseURL('img/red-2.png');?>"><p><?=$this->localization->getLocalMessage('index','screen1_2')?></p>
				</div>
				<div class="begin-list">
					<img src="<?=baseURL('img/red-3.png');?>"><p><?=$this->localization->getLocalMessage('index','screen1_3')?></p>
				</div>
			</div>
			<div class="grid_8" id="screen-2">
				<div class="begin-list">
					<img src="<?=baseURL('img/red-1.png');?>"><p><?=$this->localization->getLocalMessage('index','screen2_1')?></p>
				</div>
				<div class="begin-list">
					<img src="<?=baseURL('img/red-2.png');?>"><p><?=$this->localization->getLocalMessage('index','screen2_2')?></p>
				</div>
				<div class="begin-list">
					<img src="<?=baseURL('img/red-3.png');?>"><p><?=$this->localization->getLocalMessage('index','screen2_3')?></p>
				</div>
			</div>
			<div class="grid_8" id="screen-3">
				<div class="begin-list">
					<img src="<?=baseURL('img/red-1.png');?>"><p><?=$this->localization->getLocalMessage('index','screen3_1')?></p>
				</div>
				<div class="begin-list">
					<img src="<?=baseURL('img/red-2.png');?>"><p><?=$this->localization->getLocalMessage('index','screen3_2')?></p>
				</div>
				<div class="begin-list">
					<img src="<?=baseURL('img/red-3.png');?>"><p><?=$this->localization->getLocalMessage('index','screen3_3')?></p>
				</div>
			</div>
			<?php $this->load->view("users_interface/modal/begin-trade");?>
			<div class="control">
				<a class="control-line active" id="control-1"></a>
				<a class="control-line" id="control-2"></a>
				<a class="control-line" id="control-3"></a>
			</div>
		</div>
	</div>
	<div class="fish-container">
		<div class="container_12">
			<div class="grid_12">
				<div class="fish-div">
					<div class="fish-img-container"><img src="<?=baseURL('img/fish-1.png');?>"></div>
					<p><h2><?=$this->localization->getLocalMessage('index','fish1_1');?></h2></p>
					<p class="normal-text"><?=$this->localization->getLocalMessage('index','fish1_2');?></p>
				</div>
				<div class="fish-bet">&nbsp;</div>
				<div class="fish-div">
					<div class="fish-img-container"><img src="<?=baseURL('img/fish-2.png');?>"></div>
					<p><h2><?=$this->localization->getLocalMessage('index','fish2_1');?></h2></p>
					<p class="normal-text"><?=$this->localization->getLocalMessage('index','fish2_2');?></p>
				</div>
				<div class="fish-bet">&nbsp;</div>
				<div class="fish-div">
					<div class="fish-img-container"><img src="<?=baseURL('img/fish-3.png');?>"></div>
					<p><h2><?=$this->localization->getLocalMessage('index','fish3_1');?></h2></p>
					<p class="normal-text"><?=$this->localization->getLocalMessage('index','fish3_2');?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="money-container">
		<div class="container_12">
			<div class="money-in-container">
				<div class="grid_12">
					<?php $this->load->view("users_interface/includes/rss");?>
				</div>
				<div class="grid_9">
					<?php $this->load->view("users_interface/includes/ticker");?>
				</div>
				<div class="grid_3 money-div-right">
					<p class="money-right-title"><?=$this->localization->getLocalMessage('index','money_right');?></p>
					<div class="money-right-list">
						<img src="<?=baseURL('img/red-1.png');?>">
						<div>
							<h2><?=$this->localization->getLocalMessage('index','money_right1_1');?></h2>
							<p class="normal-text"><?=$this->localization->getLocalMessage('index','money_right1_2');?></p>
						</div>
					</div>
					<div class="money-right-list">
						<img src="<?=baseURL('img/red-1.png');?>">
						<div>
							<h2><?=$this->localization->getLocalMessage('index','money_right2_1');?></h2>
							<p class="normal-text"><?=$this->localization->getLocalMessage('index','money_right2_1');?></p>
						</div>
					</div>
					<div class="money-right-list">
						<img src="<?=baseURL('img/red-1.png');?>">
						<div>
							<h2><?=$this->localization->getLocalMessage('index','money_right3_1');?></h2>
							<p class="normal-text"><?=$this->localization->getLocalMessage('index','money_right3_1');?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="fish-container">
		<div class="container_12">
			<?=(isset($page[1]['content']))?$page[1]['content']:'';?>
		</div>
	</div>
	<?php $this->load->view("users_interface/modal/signup");?>
	<div class="fish-container">
		<div class="container_12">
			<?=(isset($page[2]['content']))?$page[2]['content']:'';?>
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
