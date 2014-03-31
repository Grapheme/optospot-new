<div class="span5">
	<div class="well sidebar-nav">
		<ul class="nav nav-pills nav-stacked">
			<li class="nav-header"><?=$this->localization->getLocalButton('client_sidebar','navigation')?></li>
			<li num="home"><?=anchor('',$this->localization->getLocalButton('client_sidebar','home'));?></li>
			<li num="trading"><?=anchor('trade',$this->localization->getLocalButton('client_sidebar','trade'));?></li>
			<?php if($this->profile['demo'] == 0):?>
				<li num="balance"><?=anchor('cabinet/balance',$this->localization->getLocalButton('client_sidebar','deposit'));?></li>
				<li num="withdraw"><?=anchor('cabinet/withdraw',$this->localization->getLocalButton('client_sidebar','withdrawal'));?></li>
			<?php else:?>
				<li num="balance"><?=anchor('cabinet/balance',$this->localization->getLocalButton('client_sidebar','real_register'));?></li>
				<li num="withdraw"><?=anchor('cabinet/balance',$this->localization->getLocalButton('client_sidebar','withdrawal'));?></li>
			<?php endif;?>
			<li num="my-accounts"><?=anchor('cabinet/my-accounts',$this->localization->getLocalButton('client_sidebar','my-accounts'));?></li>
			<li num="profile"><?=anchor('cabinet/profile',$this->localization->getLocalButton('client_sidebar','profile'));?></li>
			<li class="nav-header"><?=$this->localization->getLocalButton('client_sidebar','actions')?></li>
			<li><?=anchor('logoff',$this->localization->getLocalButton('client_sidebar','logout'));?></li>
		</ul>
	</div>
</div>