<footer>
	<div class="container_12 footer-container">
	<?php for($i=0;$i<count($footer['category']);$i++):?>
		<div class="footer-block">
		<h4><?=$footer['category'][$i]['title'];?></h4>
			<nav>
				<ul>
			<?php for($j=0;$j<count($footer['pages']);$j++):?>
				<?php if($footer['pages'][$j]['category'] == $footer['category'][$i]['id']):?>
					<li><?=anchor($footer['pages'][$j]['url'],$footer['pages'][$j]['link'],'class="footer-link"');?></li>
				<?php endif;?>
			<?php endfor;?>
				</ul>
			</nav>
		</div>
	<?php endfor;?>
		<div class="clear"></div>
		<div class="footer-end">
			<p class="footer-end-left">&copy; <?=$this->localization->getLocalButton('copyright','copy');?></p>
		</div>
	</div>
</footer>