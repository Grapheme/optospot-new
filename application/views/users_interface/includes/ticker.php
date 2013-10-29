<div class="grid_9 money-div">
	<div class="money-select-div">
		<select class="money-select">
			<option>USD/JPY</option>
			<option>USD/JPY</option>
			<option>USD/JPY</option>
		</select>
	</div>
	<div class="money-color-div">
		<p class="money-color"><?=$this->localization->getLocalButton('ticker','payout')?><br><span>65%</span></p>
		<input type="text" class="money-all" placeholder="<?=$this->localization->getLocalButton('ticker','amount')?>, $">
	</div>
	<div class="money-earn-div">
		<p class="money-earn-top"><?=$this->localization->getLocalButton('ticker','winning_payout')?><br><span>$1.65</span></p>
		<p class="money-earn-bottom"><?=$this->localization->getLocalButton('ticker','minimum_payout')?><br><span>$0.12</span></p>
	</div>
	<div class="money-cont">
		<img src="<?=baseURL('img/money-arrow-top.png');?>">
		<p>132.<span>11</span></p>
		<img src="<?=baseURL('img/money-arrow-down.png');?>">
	</div>
	<div class="money-submit">
		<p>00:08</p>
		<a href="<?=base_url('trade');?>" class="green-button"><?=$this->localization->getLocalButton('ticker','invest')?></a>
	</div>
</div>