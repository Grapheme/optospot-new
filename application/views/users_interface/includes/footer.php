<footer>
	<div class="container_12 footer-container">
	<?php for($i=0;$i<count($footer['category']);$i++):?>
		<div class="footer-block">
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
			<p class="footer-end-left">&copy; 2012-2013 Optospot. Все права защищены</p>
			<p class="footer-end-right">Разработанно агенством &laquo;Графема&raquo;</p>
		</div>
	</div>
</footer>