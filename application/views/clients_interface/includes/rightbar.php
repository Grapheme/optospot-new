<div class="span5">
	<ul class="right-menu">
		<!-- <li class="nav-header"><?=$this->localization->getLocalButton('client_sidebar','navigation')?></li> -->
		<li num="home"><?=anchor('',$this->localization->getLocalButton('client_sidebar','home'));?></li>
		<?php if($this->loginstatus && $this->profile['demo'] == 0): ?>
		<li num="trading"><a href="<?=site_url('binarnaya-platforma/online-treiding?acc=pro')?>"><?= $this->localization->getLocalButton('client_sidebar','trade') ?></a></li>
		<?php else: ?>
		<li num="trading"><a href="<?=site_url('binarnaya-platforma/online-treiding?acc=demo')?>"><?= $this->localization->getLocalButton('client_sidebar','trade') ?></a></li>
		<?php endif; ?>
		<?php if($this->profile['demo'] == 0):?>
			<li num="balance"><?=anchor('cabinet/balance',$this->localization->getLocalButton('client_sidebar','deposit'));?></li>
			<li num="withdraw"><?=anchor('cabinet/withdraw',$this->localization->getLocalButton('client_sidebar','withdrawal'));?></li>
		<?php else:?>
			<li num="balance"><?=anchor('cabinet/balance',$this->localization->getLocalButton('client_sidebar','real_register'));?></li>
			<li num="withdraw"><?=anchor('cabinet/balance',$this->localization->getLocalButton('client_sidebar','withdrawal'));?></li>
		<?php endif;?>
		<li num="my-accounts"><?=anchor('cabinet/my-accounts',$this->localization->getLocalButton('client_sidebar','my-accounts'));?></li>
		<li num="partner-program"><?=anchor('cabinet/partner-program',$this->localization->getLocalButton('client_sidebar','partner-program'));?></li>
		<li num="profile"><?=anchor('cabinet/profile',$this->localization->getLocalButton('client_sidebar','profile'));?></li>
    <?php
        $ApprovedDocuments = TRUE;
        if($documentsList = $this->users_documents->getWhere(NULL,array('user_id'=>$this->account['id']),TRUE)):
            foreach($documentsList as $document):
                if ($document['approved'] != 1):
                    $ApprovedDocuments = FALSE;
                    break;
                endif;
            endforeach;
        endif;
    ?>
    <?php if(!$ApprovedDocuments):?>
        <li num="verification"><a href="javascript:void(0);"><?=$this->localization->getLocalButton('client_sidebar','verification_off')?></a></li>
    <?php endif;?>
	</ul>
    <?php if($ApprovedDocuments):?>
        <p class="text-success" style="margin: 10px 0 0 15px;"><?=$this->localization->getLocalButton('client_sidebar','verification_on')?></p>
    <?php endif;?>
	<div class="logout-div"><?=anchor('logoff',$this->localization->getLocalButton('client_sidebar','logout'));?></div>
</div>