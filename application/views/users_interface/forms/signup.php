<form action="<?=site_url('signup-account');?>" method="POST" id="<?=$idForm;?>">
	<input type="hidden" value="xml" name="answerType">
	<input type="hidden" value="send" name="act">
	<input type="hidden" value="main" name="office">
	<div class="input-container">
		<input class="begin-input" type="text" name="fname" value="" placeholder="<?=$this->localization->getLocalPlaceholder('signup','fname')?>" id="name">
	</div>
	<div class="input-container">
		<input class="begin-input" type="text" name="lname" value="" placeholder="<?=$this->localization->getLocalPlaceholder('signup','lname')?>" id="lastname">
	</div>
	<div class="input-container">
		<input class="begin-input" type="text" name="email" value="" placeholder="<?=$this->localization->getLocalPlaceholder('signup','email')?>" id="email">
	</div>
	<div class="input-container select-out" id="country-div">
		<?php $this->load->view('html/select-countries');?>
	</div>
	<div class="input-container select-out" id="account-div">
		<select class="begin-input" name="account_type" id="account">
			<option value="0">Тип счета</option>
			<option value="1">Демо счет</option>
			<option value="2">Профи счет</option>
		</select>
	</div>
	<div class="div-form-operation">
		<button class="red-button begin-button signup-submit"><?=$this->localization->getLocalPlaceholder('signup','open_account')?></button>
	</div>
</form>