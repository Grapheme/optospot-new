<?=form_open($this->uri->uri_string(),array('class'=>'form-horizontal form-edit-settings')); ?>
<fieldset>
	<legend><?=$form_legend;?></legend>
	<div class="control-group">
		<label for="registration" class="control-label">Registration: </label>
		<div class="controls">
			<input type="text" class="span14 valid-required" name="registration" value="<?=$settings['registration'];?>">
		</div>
	</div>
	<div class="control-group">
		<label for="charts" class="control-label">Charts: </label>
		<div class="controls">
			<input type="text" class="span14 valid-required" name="charts" value="<?=$settings['charts'];?>">
		</div>
	</div>
	<div class="control-group">
		<label for="deposit" class="control-label">Deposit: </label>
		<div class="controls">
			<input type="text" class="span14 valid-required" name="deposit" value="<?=$settings['deposit'];?>">
		</div>
	</div>
	<div class="form-actions">
			<button class="btn btn-success btn-edit-settings" type="submit" name="submit" value="submit">Submit Form</button>
		</div>
</fieldset>
<?= form_close(); ?>