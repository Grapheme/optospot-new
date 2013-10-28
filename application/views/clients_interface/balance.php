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
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><?=$this->localization->getLocalButton('client_cabinet','account')?></th>
								<th><?=$this->localization->getLocalButton('client_cabinet','deposit')?>, $</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						<? if ( count($accounts) > 0 ) : ?>
							<? foreach ($accounts as $acc) : ?>
								<tr>
									<td width="100px"><?= $acc['accountId']; ?></td>
									<td width="150px"><?= $acc['amount']; ?></td>
									<td>
										<form method="post" action="<?=$action_deposit;?>">
											<label><?=$this->localization->getLocalButton('client_cabinet','amount')?></label>
											<input name="amount" type="text" class="span2 amount" value="50" />
											<input type="hidden" name="account" value="<?= $acc['accountId']; ?>" />
											<input type="hidden" name="success" value="http://<?= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" />
											<input type="hidden" name="cancel" value="http://<?= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" />
											<button type="submit" class="btn btn-mini btn-success service-order"><?=$this->localization->getLocalButton('client_cabinet','deposit_funds')?></button>
										</form>
									</td>
								</tr>
							<? endforeach; ?>
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