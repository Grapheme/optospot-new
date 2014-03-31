<form action="<?=$action;?>" method="POST" class="form-horizontal form-edit-settings form-withdraw">
<?php if($this->account['id'] > 0):?>
	<input type="hidden" name="account_id" value="<?=$this->account['id'];?>" />
	<input type="hidden" name="trade_login" value="<?=$this->profile['trade_login'];?>" />
	<input type="hidden" name="email" value="<?=$this->profile['email'];?>" />
<?php endif; ?>
	<fieldset>
		<select name="payment">
			<label>Choose payment system:</label>
			<option value="9">MasterCard</option>
			<option value="19">WebMoney WMR</option>
			<option value="22">WebMoney WME</option>
			<option value="23">WebMoney WMZ</option>
			<option value="28">QIWI-кошелек</option>
			<!--<option value="1011350">Visa</option>-->
			<!--<option value="1013538">Яндекс.Деньги</option>-->
		</select>
		<div class="withdraw-div">
			<label>Specify the account number to withdraw money:</label>
			<input type="text" class="valid-required" name="account">
		</div>
		<div class="name-div withdraw-div" style="display: none;">
			<label>Name:</label>
			<input type="text" name="name">
		</div>
		<div class="expiry-div withdraw-div" style="display: none;">
			<label>Expiry date:</label>
			<input type="text" name="expiry">
		</div>
		<div class="withdraw-div">
			<label>Specify the amount of money, RUB:</label>
			<input type="text" class="valid-required" name="amount"><br>
		</div>
	</fieldset>
		
	<div class="form-actions">
		<button class="btn btn-success btn-withdrawal" type="submit" value="Send money">Send money</button>
	</div>
</form>