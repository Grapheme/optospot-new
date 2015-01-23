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
						<a class="brand no-clickable" href=""><?=$this->localization->getLocalButton('client_cabinet','withdrawal')?></a>
					</div>
				</div>
				<?php $this->load->view("alert_messages/alert-error");?>
				<?php $this->load->view("alert_messages/alert-success");?>
				<div>
					<?=$this->localization->getLocalMessage('documents','annotation')?>
				</div>
				<div class="clear"> </div>
				<div>
					<table class="table opt-table">
						<thead>
						<tr>
							<th><?=$this->localization->getLocalButton('user_documents','doc_link')?></th>
							<th><?=$this->localization->getLocalButton('user_documents','doc_size')?></th>
							<th><?=$this->localization->getLocalButton('user_documents','doc_approved')?></th>
						</tr>
						</thead>
						<tbody>
					<?php if(count($documents)):?>
						<?php foreach($documents as $document): ?>
							<tr class="<?= ($document['approved']) ? 'success' : 'error'; ?>">
								<td width="100px"><a href="<?=$this->baseURL.$document['path'];?>" target="_blank"><?=$document['original_name']?></a></td>
								<td width="150px"><?=round($document['filesize']/1024);?> Кбайт</td>
								<td width="150px">
							<?php if($document['approved']):?>
								<?=$this->localization->getLocalButton('user_documents','doc_approved_access')?>
							<?php else: ?>
								<?=$this->localization->getLocalButton('user_documents','doc_approved_fail')?>
							<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else:?>
						<tr>
							<td colspan="3"><?=$this->localization->getLocalButton('user_documents','empty_list')?></td>
						</tr>
					<?php endif; ?>
						</tbody>
					</table>
					<div class="signup-form" id="real-signup">
						<?php $this->load->view('clients_interface/forms/upload-document');?>
						<?=$this->localization->getLocalMessage('documents','form_format_files')?>
					</div>
					<?=$this->localization->getLocalMessage('documents','form_annotation')?>
				</div>
			</div>
		<?php $this->load->view("clients_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view("clients_interface/includes/scripts");?>
</body>
</html>