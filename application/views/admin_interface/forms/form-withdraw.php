<form action="<?=$action;?>" method="POST" class="form-horizontal form-edit-settings form-withdraw">
<?php if($this->account['id'] > 0):?>
	<input type="hidden" name="account_id" value="<?=$this->account['id'];?>" />
	<input type="hidden" name="trade_login" value="<?=$this->profile['trade_login'];?>" />
	<input type="hidden" name="email" value="<?=$this->profile['email'];?>" />
<?php endif; ?>
	<div class="form-container">
		<fieldset>
			<label><?=$this->localization->getLocalButton('withdraw','payment')?>:</label>
			<select name="payment">
				<option value="9">MasterCard</option>
				<!--<option value="19">WebMoney WMR</option>
				<option value="22">WebMoney WME</option>
				<option value="23">WebMoney WMZ</option>-->
				<option value="28">QIWI-кошелек</option>
				<!--<option value="1011350">Visa</option>-->
				<!--<option value="1013538">Яндекс.Деньги</option>-->
			</select>
			<div class="withdraw-div">
				<input placeholder="<?=$this->localization->getLocalButton('withdraw','account_number')?>" data-card="<?=$this->localization->getLocalButton('withdraw','account_number')?>" data-qiwi="<?=$this->localization->getLocalButton('withdraw','account_number_qiwi')?>" type="text" class="valid-required card-account" name="account">
			</div>
			<div class="name-div withdraw-div" style="display: none;">
				<input placeholder="<?=$this->localization->getLocalButton('withdraw','holder_name')?>" class="valid-required" type="text" name="name">
			</div>
			<div class="expiry-div withdraw-div" style="display: none;">
				<input placeholder="<?=$this->localization->getLocalButton('withdraw','expiry_date')?>" class="valid-required card-expiry-date" type="text" name="expiry">
			</div>
			<div class="withdraw-div">
				<input placeholder="<?=$this->localization->getLocalPlaceholder('withdraw','summa')?>" type="text" class="valid-required" name="amount"><br>
			</div>
		</fieldset>
	</div>
	<div class="form-actions">
		<button class="opt-btn btn-withdrawal" type="submit" value="Send money"><?=$this->localization->getLocalButton('withdraw','submit_withdraw')?></button>
	</div>
	
</form>