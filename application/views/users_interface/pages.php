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
			<div class="grid_2 typical-menu">
			<?php if($active_category):?>
				<nav>
					<ul>
				<?php for($i=0;$i<count($footer['pages']);$i++):?>
					<?php if($footer['pages'][$i]['category'] == $active_category):?>
						<li data-url="<?=$footer['pages'][$i]['url'];?>">
							<?=anchor($footer['pages'][$i]['url'],$footer['pages'][$i]['link'],'class="typical-link"');?>
						</li>
					<?php endif;?>
				<?php endfor;?>
					</ul>
				</nav>
			<?php endif;?>
			</div>
			<div class="grid_6">
				<div class="normal-text">
					<?=$content;?>
				</div>
			</div>
			<?php $this->load->view("users_interface/includes/rss",array('inline'=>FALSE));?>
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