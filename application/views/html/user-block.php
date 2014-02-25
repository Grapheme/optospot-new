<div class="auth-data">
<?php if($this->account['id'] == 0):?>
	<a href="<?=baseURL(ADMIN_START_PAGE);?>" class="action-cabinet"><?=$this->localization->getLocalButton('user_block','admin_link')?></a>
<?php else:
	if($this->profile['demo'] == 1 && $this->account['id'] > 0):
		if($this->uri->uri_string() == $this->language_url.'/binarnaya-platforma/online-treiding'):
			echo anchor(USER_START_PAGE,'Demo account',array('class'=>'action-cabinet','target'=>'_blank'));
		else:
			echo anchor(USER_START_PAGE,'Demo account',array('class'=>'action-cabinet'));
		endif;
	else:
		if($this->uri->segment(2) == 'trade'):
			echo anchor(USER_START_PAGE,$this->localization->getLocalButton('user_block','user_link'),array('class'=>'action-cabinet','target'=>'_blank'));
		else:
			echo anchor(USER_START_PAGE,$this->localization->getLocalButton('user_block','user_link'),array('class'=>'action-cabinet'));
		endif;
	endif;
endif;?>
	<?php if($this->profile['demo'] == 1 && $this->account['id'] > 0) {

	} else {
		$CI = & get_instance();
		$tradeAccount = $CI->getTradeAccountInfo();
		foreach ($tradeAccount['accounts'] as $acc): ?>
			<!--<div class="trader-div"><a href="<?=site_url('cabinet/balance');?>">trader_<?=$acc['accountId'];?></a></div>-->
			<div class="trader-div">
				<?=$this->localization->getLocalButton('user_block','trader-balance')?>
				<strong><?=$acc['amount'];?></strong><br>
				<a href="<?=site_url('cabinet/balance');?>" class="trader-div-money"><?=$this->localization->getLocalButton('user_block','fill-acc');?></a>
			</div>
		<?php endforeach;
	} ?>
		
	<a class="action-cabinet" href="<?=site_url('logoff');?>"><?=$this->localization->getLocalButton('user_block','logoff')?></a>
</div>