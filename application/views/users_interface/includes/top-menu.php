<div class="menu">
	<div class="menu-left">
		<nav>
			<ul>
			<?php for($i=1;$i<count($main_menu);$i++):?>
				<li><?=anchor($main_menu[$i]['url'],$main_menu[$i]['link'],'class="top-link"');?></li>
			<?php endfor;?>
			<?php
				/*switch ($this->language):
					case '1': echo '<a target="_blank" class="top-link" href="'.baseURL('img/diploma.jpg').'">Awards</a>';break;
					case '4': echo '<a target="_blank" class="top-link" href="'.baseURL('img/diploma.jpg').'">Penghargaan</a>';break;
					case '3': echo '<a target="_blank" class="top-link" href="'.baseURL('img/diploma.jpg').'">Награды</a>'; break;
					default: echo '<a target="_blank" class="top-link" href="'.baseURL('img/diploma.jpg').'">Награды</a>'; break;
				endswitch;*/
			?>
			</ul>
		</nav>
	</div>
	<div class="menu-right">
		<div>trader_2</div>
		<div>Ваш баланс: $309<br><a href="#">пополнить счет</a></div>
		<?php if(!$this->loginstatus):?>
			<a onclick="yaCounter21615634.reachGoal('register');" href="<?=site_url('registering')?>"><?=$this->localization->getLocalMessage('index','user_block_reg')?></a>
<<<<<<< HEAD
			<button return true;" class="red-button" id="enter"><?=$this->localization->getLocalMessage('index','user_block_login')?></button>
=======
			<button class="red-button" id="enter"><?=$this->localization->getLocalMessage('index','user_block_login')?></button>
>>>>>>> 34897f823786463dc1d21ffc1a060a4d6ccd8580
		<?php else:?>
			<?php $this->load->view('html/user-block');?>
		<?php endif;?>
		<div class="lang-div">
			<select id="ChangeLang" class="lang">
			<?php for($i=0;$i<count($languages);$i++):?>
				<option value="<?=mb_strtolower($languages[$i]['uri']);?>"<?=($languages[$i]['id'] == $this->language)?' selected="selected"':''?>><?=mb_strtoupper($languages[$i]['uri']);?></option>
			<?php endfor;?>
			</select>
		</div>
	</div>
</div>