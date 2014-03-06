<!DOCTYPE html>	
<html lang="en">
<head>
<?php $this->load->view("clients_interface/includes/head");?>
</head>
<body>
	<?php $this->load->view("clients_interface/includes/header");?>
	<div class="container">
		<div class="row">
			<div class="span19">
				<div class="navbar">
					<div class="navbar-inner">
						<a class="brand none" href=""><?=$this->localization->getLocalButton('client_cabinet','balance')?></a>
					</div>
				</div>
				<?php $this->load->view("alert_messages/alert-error");?>
				<?php $this->load->view("alert_messages/alert-success");?>
				<div>
				<?php if(!empty($accounts)):?>
					<div id="deposit_system" class="none-display">
					<?php foreach($accounts as $system => $account):?>
						<p><?=$account['information'];?></p>
						<button type="button" class="btn btn-mini btn-success submit_deposit_form" data-form-id="form_<?=$system;?>"><?=$this->localization->getLocalButton('client_cabinet','deposit_'.$system);?></button>
					<?php endforeach; ?>
					<hr/>
					<button type="button" id="submit_deposit_form_cancel" class="btn btn-mini btn-success"><?=$this->localization->getLocalButton('client_cabinet','deposit_submit_cancel');?></button>
					</div>
				<?php endif;?>
					<table id="div_deposit_value" class="table table-bordered">
						<thead>
							<tr>
								<th><?=$this->localization->getLocalButton('client_cabinet','account')?></th>
								<th><?=$this->localization->getLocalButton('client_cabinet','deposit')?>, $</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
					<?php if(!empty($accounts)):?>
							<tr>
								<td width="100px"><?=(isset($accounts['dengionline']['accountId']))?$accounts['dengionline']['accountId']:'undefined';?></td>
								<td width="150px"><?=(isset($accounts['dengionline']['amount']))?$accounts['dengionline']['amount']:'undefined';?></td>
								<td>
									<label><?=$this->localization->getLocalButton('client_cabinet','amount')?></label>
									<input id="deposit_value"autocomplete="off" type="text" class="span2" value="50" />
									<button type="submit" id="set_deposit_value" class="btn btn-mini btn-success"><?=$this->localization->getLocalButton('client_cabinet','deposit_funds')?></button>
								</td>
							</tr>
						<?php foreach($accounts as $system => $account):?>
							<tr class="none-display">
								<td width="100px">&nbsp;</td>
								<td width="150px">&nbsp;</td>
								<td>
									<form id="form_<?=$system;?>" method="post" action="<?=$account['deposit'];?>">
										<input type="hidden" name="amount" value="50" />
										<input type="hidden" name="account" value="<?= $account['accountId']; ?>" />
										<input type="hidden" name="success" value="http://<?= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" />
										<input type="hidden" name="cancel" value="http://<?= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" />
										<button id="submit_<?=$system;?>" type="submit">Submit</button>
									</form>
								</td>
							</tr>
						<?php endforeach; ?>
					<? else : ?>
							<div class="alert-error">
								<p>Error while requesting user balance. Please send email to support@optospot.net with problem description.</p>
							</div>
					<? endif; ?>
						</tbody>
					</table>	
				</div>
			
			</div>
		<?php $this->load->view("clients_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view("clients_interface/includes/scripts");?>
</body>
</html>