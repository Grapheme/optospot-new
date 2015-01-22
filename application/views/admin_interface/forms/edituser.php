<?=form_open(uri_string(),array('class'=>'form-horizontal form-edit-user')); ?>
	<fieldset>
		<legend>The form of editing profile. User login: <em><?=strtolower($account['email']);?></em></legend>
		<ul id="ProductTab" class="nav nav-tabs">
			<li class="active"><a href="#general" data-toggle="tab">General</a></li>
			<li><a href="#address" data-toggle="tab">Address</a></li>
			<li><a href="#additionally" data-toggle="tab">Advanced</a></li>
			<li><a href="#documents" data-toggle="tab">Documents</a></li>
		</ul>
		<div id="ProductTabContent" class="tab-content">
			<div class="tab-pane fade in active" id="general">
				<div class="control-group">
					<label for="first_name" class="control-label">First name: </label>
					<div class="controls">
						<input type="text" class="span10 valid-required" autocomplete="off" name="first_name" value="<?=$account['first_name'];?>">
					</div>
				</div>
				<div class="control-group">
					<label for="last_name" class="control-label">Last name: </label>
					<div class="controls">
						<input type="text" class="span10 valid-required" autocomplete="off" name="last_name" value="<?=$account['last_name'];?>">
					</div>
				</div>
				<div class="control-group">
					<label for="zip_code" class="control-label">Zip code: </label>
					<div class="controls">
						<input type="text" class="span6" name="zip_code" autocomplete="off" value="<?=$account['zip_code'];?>">
					</div>
				</div>
				<div class="control-group">
					<label for="day_phone" class="control-label">Day phone: </label>
					<div class="controls">
						<input type="text" class="span6" name="day_phone" autocomplete="off" value="<?=$account['day_phone'];?>">
					</div>
				</div>
				<div class="control-group">
					<label for="home_phone" class="control-label">Home phone: </label>
					<div class="controls">
						<input type="text" class="span6" name="home_phone" autocomplete="off" value="<?=$account['home_phone'];?>">
					</div>
				</div>
				<div class="control-group">
					<label for="signdate" class="control-label">Date of sign up: </label>
					<div class="controls">
						<label class="checkbox" style="padding-left: 0">
							<span class="label label-info"><?=strtoupper($account['signdate'])?></span>
						</label>
					</div>
				</div>
			</div>
			<div class="tab-pane fade in" id="address">
				<div class="control-group">
					<label for="address1" class="control-label">Address line 1: </label>
					<div class="controls">
						<textarea rows="1" class="span14" autocomplete="off" name="address1"><?=$account['address1'];?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label for="address2" class="control-label">Address line 2: </label>
					<div class="controls">
						<textarea rows="1" class="span14" autocomplete="off" name="address2"><?=$account['address2'];?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label for="country" class="control-label">Country: </label>
					<div class="controls">
						<input type="text" class="span8" autocomplete="off" name="country" value="<?=$account['country'];?>">
					</div>
				</div>
				<div class="control-group">
					<label for="state" class="control-label">State: </label>
					<div class="controls">
						<input type="text" class="span8" autocomplete="off" name="state" value="<?=$account['state'];?>">
					</div>
				</div>
				<div class="control-group">
					<label for="city" class="control-label">City: </label>
					<div class="controls">
						<input type="text" class="span8" autocomplete="off" name="city" value="<?=$account['city'];?>">
					</div>
				</div>
			</div>
			<div class="tab-pane fade in" id="additionally">
				<div class="control-group">
					<label for="email" class="control-label">User email: </label>
					<div class="controls">
						<input type="text" class="span8" disabled="disabled" autocomplete="off" name="email" value="<?=$account['email'];?>">
					</div>
				</div>
				<div class="control-group">
					<label for="trade_login" class="control-label">Trade login: </label>
					<div class="controls">
						<input type="text" class="span8" disabled="disabled" autocomplete="off" name="trade_login" value="<?=$account['trade_login'];?>">
					</div>
				</div>
				<div class="control-group">
					<label for="password" class="control-label">Trade password: </label>
					<div class="controls">
						<input type="text" class="span8" disabled="disabled" autocomplete="off" name="password" value="<?=$account['password'];?>">
					</div>
				</div>
			<?php if($this->account['id'] == 0):?>
				<div class="control-group info">
					<label for="remote_id" class="control-label">Trade ID: </label>
					<div class="controls">
						<input type="text" class="span3" disabled="disabled" autocomplete="off" name="remote_id" value="<?=$account['remote_id'];?>">
					</div>
				</div>
				<div class="control-group">
					<label for="status" class="control-label">Status user: </label>
					<div class="controls">
						<label class="checkbox" style="width:0;">
							<input type="checkbox" value="1" id="active" name="active" autocomplete="off" <?=($account['active'])?'checked="checked"':'';?>>
							<?=($account['active'])?'<span class="label label-success">ACTIVE</span>':'<span class="label label-important">DEACTIVE</span>';?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label for="coach" class="control-label">Status of conversation: </label>
					<div class="controls">
						<label class="checkbox" style="width:0;">
							<input type="checkbox" value="1" id="coach" name="coach" autocomplete="off" <?=(!$account['coach'])?'checked="checked" disabled="disabled"':'';?>>
							<?=(!$account['coach'])?'<span class="label label-success">Completed</span>':'<span class="label label-important">NOT FULFILLED</span>';?>
						</label>
					</div>
				</div>
				<hr/>
				<div class="control-group">
					<label for="language" class="control-label">User language: </label>
					<div class="controls">
						<label class="checkbox" style="padding-left: 0">
							<span class="label"><?=strtoupper($langs[$account['language']-1]['name'])?></span>
						</label>
					</div>
				</div>
			<?php endif;?>
			</div>
			<div class="tab-pane fade in" id="documents">
				<table class="opt-table">
					<thead>
					<tr>
						<th>Document</th>
						<th>Size</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php if(count($documents)):?>
						<?php $this->load->helper('date');?>
						<?php foreach($documents as $document): ?>
							<tr>
								<td width="100px"><a href="<?=$this->baseURL.$document['path'];?>" target="_blank"><?=$document['original_name']?></a></td>
								<td width="150px"><?=round($document['filesize']/1024);?> Кb</td>
								<td width="150px"><?=swap_dot_date_without_time($document['created_at']);?></td>
								<td width="150px">
									<a class="js-confirm" href="<?=$this->baseURL.'admin-panel/documents/delete/'.$document['id']?>">Delete</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else:?>
						<tr>
							<td colspan="4"><?=$this->localization->getLocalButton('user_documents','empty_list')?></td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</fieldset>
	<div class="form-actions">
		<button class="btn btn-success btn-edit-user" type="submit" name="submit" value="send">Save profile</button>
		<button class="btn backpath" type="button">Cancel</button>
	</div>
<?= form_close(); ?>