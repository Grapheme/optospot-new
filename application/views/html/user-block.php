<div class="auth-data">
<?php if($this->account['id'] == 0):?>
	<a href="<?=baseURL(ADMIN_START_PAGE);?>" class="action-cabinet"><?=$this->localization->getLocalButton('user_block','admin_link')?></a>
<?php else:?>
	Hello, <strong><?=$this->profile['first_name'].' '.$this->profile['last_name'];?></strong><br/>
	<?php if($this->uri->segment(2) == 'trade'):?>
	<?=anchor(USER_START_PAGE,$this->localization->getLocalButton('user_block','user_link'),array('class'=>'action-cabinet','target'=>'_blank'));?>
	<?php else:?>
	<?=anchor(USER_START_PAGE,$this->localization->getLocalButton('user_block','user_link'),array('class'=>'action-cabinet'));?>
	<?php endif;?>
<?php endif;?>
	<a class="action-cabinet" href="<?=site_url('logoff');?>"><?=$this->localization->getLocalButton('user_block','logoff')?></a>
<?php if($this->profile['demo'] == 1 && $this->account['id'] > 0):?>
	<br />(Demo account)
<?php endif;?>
</div>