<?=form_open(uri_string(),array('class'=>'form-horizontal form-edit-settings')); ?>
	<fieldset>
		<label>Choose payment system:</label>
		<select name="payment">
			<option value="1">Visa</option>
			<!--<option value="2">Mastercard</option>
			<option value="3">Qiwi</option>
			<option value="4">Яндекс.Деньги</option>
			<option value="5">Webmoney</option>-->
		</select>
		<label>Specify the account number to withdraw money:</label>
		<input type="text" name="account"><br>
		<label>Specify the amount of money, RUB:</label>
		<input type="text" name="deposit"><br>
	</fieldset>
	<div class="form-actions">
		<button class="btn btn-success" type="submit" name="submit" value="send">Send money</button>
	</div>
<?= form_close(); ?>