<header>
	<div class="container">
		<div class="row">
			<div class="span18">
				<h1>
					<?=$this->localization->getLocalButton('client_cabinet','page_name')?>
				<?php if($this->profile['demo'] == 1):?>
					(<?=$this->localization->getLocalButton('client_cabinet','demo_account')?>)
				<?php endif;?>
				</h1>
			</div>
		</div>
	</div>
</header>