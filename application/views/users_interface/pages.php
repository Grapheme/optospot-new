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
			<div class="grid_3 typical-menu">
			&nbsp;
			<?php if($active_category):?>
				<nav>
					<ul>
				<?php for($i=0;$i<count($footer['pages']);$i++):?>
					<?php if($footer['pages'][$i]['category'] == $active_category):?>
						<li data-url="<?=$footer['pages'][$i]['url'];?>">
						<?php if($footer['pages'][$i]['url'] == noFirstSegment(uri_string()))
						{
							$isactive = " active";
						} else {
							$isactive = "";
						}
						?>
							<?=anchor($footer['pages'][$i]['url'],$footer['pages'][$i]['link'],'class="typical-link'.$isactive.'"');?>
						<br>
						</li>
					<?php endif;?>
				<?php endfor;?>
					</ul>
				</nav>
			<?php endif;?>
			</div>
			<div class="grid_9">
				<?php //if(noFirstSegment(uri_string()) == 'binarnie-opcioni-otkrit-schet') { 
						if(noFirstSegment(uri_string()) == 'partners/white-labels') { ?>
					<div class="trade-banner">
						<h2>Торговать бинарными опционами просто</h2>
						<div>
							<div class="trade-block">
								<p class="normal-text">Выберите базовые активы</p>
								<select class="money-select">
									<option>USD/JPY</option>
									<option>USD/JPY1</option>
									<option>USD/JPY2</option>
								</select>
							</div>
							<div class="trade-banner-arrow">&nbsp;</div>
							<div class="trade-block">
								<p class="normal-text">Определите, куда пойдет цена</p>
								<div class="trade-banner-arrows-div">
									<a href="#" class="money-arrow-top" style="display: block; margin: 0 auto;"></a>
									<div class="trade-banner-between-arrows" id="call-put">
										<p class="trade-banner-pull">call</p>
										<p class="trade-banner-put">put</p>
									</div>
									<a href="#" class="money-arrow-down" style="display: block; margin: 0 auto;"></a>
								</div>
							</div>
							<div class="trade-banner-arrow">&nbsp;</div>
							<div class="trade-block">
								<p class="normal-text">Введите сумму</p>
								<div class="trade-banner-arrows-div" id="price-change">
									<a href="#" class="money-arrow-top" style="display: block; margin: 0 auto;"></a>
									<div class="trade-banner-between-arrows">
										<p class="trade-banner-price">$<span>25</span></p>
									</div>
									<a href="#" class="money-arrow-down" style="display: block; margin: 0 auto;"></a>
								</div>
							</div>
							<div class="trade-banner-arrow">&nbsp;</div>
							<div class="trade-block">
								<p class="normal-text">Инвестируйте</p>
								<a href="http://localhost/git/optospot-new/ru/binarnaya-platforma/online-treiding" class="green-button"><?=$this->localization->getLocalButton('ticker','invest')?></a>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="trade-banner-bottom">
							<div class="trade-block">
								<p class="trade-block-sub-text">Валютные пары, серебро, золото... На чем вы хотите заработать?</p>
							</div>
							<div class="trade-banner-arrow trade-bottom-arrow">&nbsp;</div>
							<div class="trade-block">
								<p class="trade-block-sub-text">Подорожает или подешевеет выбраный вами актив?</p>
							</div>
							<div class="trade-banner-arrow trade-bottom-arrow">&nbsp;</div>
							<div class="trade-block">
								<p class="trade-block-sub-text">Вы можете инвестировать от 5 USD до 1000 USD.</p>
							</div>
							<div class="trade-banner-arrow trade-bottom-arrow">&nbsp;</div>
							<div class="trade-block">
								<p class="trade-block-sub-text">Заработайте до 100% от вложенной суммы!</p>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="normal-text">
					<?=$content;?>
				</div>
			</div>
		</div>
		
		
		
		<?php 
			if(noFirstSegment(uri_string()) == 'binarnie-opcioni-demo-schet')
			{
				$type = "demo";
			} 
			elseif(noFirstSegment(uri_string()) == 'binarnie-opcioni-otkrit-schet') 
			{
				$type = "pro";
			} 
			else 
			{
				$type = "none";
			}
		?>
		
		<?php if($type!="none") { ?>

			<?php if($this->loginstatus === FALSE):?>
			<div class="main-container kit">
				<div class="container_12 reg-container">
					<div class="reg-form">
						<h1 class="begin-title"><?=$this->localization->getLocalButton('signup','form_title');?></h1>
						<?php $posit = "down"; ?>
						<?=$this->load->view('users_interface/forms/signup-page',array('idForm'=>'reg-form','type'=>$type));?>
					</div>
				</div>
			</div>
			<?php endif;?>
		
		<?php } ?>
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