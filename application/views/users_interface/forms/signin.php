<form action="<?=site_url('login')?>" method="POST">
	<div class="input-container"><input class="begin-input" type="text" name="login" value="" placeholder="<?=$this->localization->getLocalPlaceholder('signin','login')?>" id="auth-name"></div>
	<div class="input-container"><input class="begin-input" type="password" name="password" value="" placeholder="<?=$this->localization->getLocalPlaceholder('signin','pass')?>" id="auth-pass"></div>
	<div class="login-popup-enter">
		<a href="#" class="footer-link no-clickable a-forgot-pass"><?=$this->localization->getLocalPlaceholder('signin','login_forgot')?></a><br>
		<div class="div-form-operation">
			<button class="red-button begin-button btn-submit" id="auth-enter"><?=$this->localization->getLocalPlaceholder('signin','login_account')?></button><br>
		</div>
		<a href="<?=site_url('registering');?>" class="footer-link"><?=$this->localization->getLocalPlaceholder('signin','login_reg')?></a>
	</div>
</form>