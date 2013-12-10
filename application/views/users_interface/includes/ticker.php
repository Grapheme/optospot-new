<div class="grid_9 money-div ticker-item" data-ccf="EUR" data-ccs="USD">
	<div class="money-select-div">
		<select class="money-select">
			<option>USD/JPY</option>
		</select>
	</div>
	<div class="money-color-div">
		<p class="money-color"><?=$this->localization->getLocalButton('ticker','payout')?><br><span id="payout">65%</span></p>
		<input type="text" class="money-all" placeholder="<?=$this->localization->getLocalButton('ticker','amount')?>, $">
	</div>
	<div class="money-earn-div">
		<p class="money-earn-top"><?=$this->localization->getLocalButton('ticker','winning_payout')?><br><span id="winmax">$1.65</span></p>
		<p class="money-earn-bottom"><?=$this->localization->getLocalButton('ticker','minimum_payout')?><br><span id="winmin">$0.15</span></p>
	</div>
	<div class="money-cont">
		<a href="#" class="money-arrow-top"></a>
		<p id="bid">82.<span>38</span></p>
		<a href="#" class="money-arrow-down"></a>
	</div>
	<div class="money-submit">
		<p id="exp">00:08</p>
		<a onclick="yaCounter21615634.reachGoal('bid'); return true;" <?php if($this->loginstatus) { echo 'href="'.base_url('trade').'"'; } else { echo 'href="#" id="green-enter"';}?> class="green-button"><?=$this->localization->getLocalButton('ticker','invest')?></a>
	</div>
</div>
<div class="grid_9 money-div ticker-item" data-ccf="USD" data-ccs="JPY">
	<div class="money-select-div">
		<select class="money-select">
			<option>USD/JPY</option>
		</select>
	</div>
	<div class="money-color-div">
		<p class="money-color"><?=$this->localization->getLocalButton('ticker','payout')?><br><span id="payout">65%</span></p>
		<input type="text" class="money-all" placeholder="<?=$this->localization->getLocalButton('ticker','amount')?>, $">
	</div>
	<div class="money-earn-div">
		<p class="money-earn-top"><?=$this->localization->getLocalButton('ticker','winning_payout')?><br><span id="winmax">$1.65</span></p>
		<p class="money-earn-bottom"><?=$this->localization->getLocalButton('ticker','minimum_payout')?><br><span id="winmin">$0.15</span></p>
	</div>
	<div class="money-cont">
		<a href="#" class="money-arrow-top"></a>
		<p id="bid">82.<span>38</span></p>
		<a href="#" class="money-arrow-down"></a>
	</div>
	<div class="money-submit">
		<p id="exp">00:08</p>
		<a onclick="yaCounter21615634.reachGoal('bid'); return true;" <?php if($this->loginstatus) { echo 'href="'.base_url('trade').'"'; } else { echo 'href="#" id="green-enter"';}?> class="green-button"><?=$this->localization->getLocalButton('ticker','invest')?></a>
	</div>
</div>