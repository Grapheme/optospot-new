<form action="<?=site_url('signup-account');?>" method="POST" id="<?=$idForm;?>">
	<input type="hidden" value="xml" name="answerType">
	<input type="hidden" value="send" name="act">
	<input type="hidden" value="main" name="office">
	<div class="reg-normal">
	<div class="input-container">
		<input class="begin-input input-fname" type="text" name="fname" value="" placeholder="<?=$this->localization->getLocalPlaceholder('signup','fname')?>">
	</div>
	<div class="input-container">
		<input class="begin-input input-lname" type="text" name="lname" value="" placeholder="<?=$this->localization->getLocalPlaceholder('signup','lname')?>">
	</div>
	<div class="input-container">
		<input class="begin-input input-email" type="text" name="email" value="" placeholder="<?=$this->localization->getLocalPlaceholder('signup','email')?>">
	</div>
	<div class="input-container select-out country-div">
		<?php $this->load->view('html/select-countries');?>
	</div>
	<div class="input-container select-out account-div">
		<select class="begin-input input-account" name="account_type" id="account">
			<option value="0"><?=$this->localization->getLocalButton('signup','type_account');?></option>
			<option value="1"><?=$this->localization->getLocalButton('signup','demo_account');?></option>
			<option value="2"><?=$this->localization->getLocalButton('signup','real_account');?></option>
		</select>
	</div>
	<div class="div-form-operation">
		<button onclick="yaCounter21615634.reachGoal('frmregister'); return true;" class="red-button begin-button signup-submit btn-locked"><?=$this->localization->getLocalPlaceholder('signup','open_account')?></button>
	</div>
	</div>
	<div class="reg-error none-display">
		<p class="normal-text">
			Ошибка регистрации.<br>
			Что-то пошло не так. Попробуйте чуть позже, все обязательно получится.
		</p>
		<button class="red-button try-again">Попробуйте еще</button>
	</div>
	<div class="reg-email none-display">
		<p class="normal-text">
			<?=$this->localization->getLocalMessage('index','email-exist')?>
		</p>
		<button class="red-button try-again">Попробуйте еще</button>
	</div>
	<div class="reg-loading none-display">
		<p class="normal-text">
			Секундочку, мы работаем.
		</p>
	</div>
	<div class="reg-success none-display">
		<p class="normal-text">
			<?=$this->localization->getLocalMessage('index','success-reg')?>
		</p>
	</div>
</form>