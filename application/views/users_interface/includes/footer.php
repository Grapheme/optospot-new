<?php

$blocked = array(0,0,0);
for($i=0;$i<count($footer['pages']);$i++):
    if($footer['pages'][$i]['category'] == 23):
        $blocked[0] = 4;
    endif;
    if($footer['pages'][$i]['category'] == 22):
        $blocked[1] = 14;
    endif;
    if($footer['pages'][$i]['category'] == 21):
        $blocked[2] = 19;
    endif;
endfor;

?>
<footer>
	<div class="container_12 footer-container">
	<?php for($i=0;$i<count($footer['category']);$i++):?>
        <?php
        if (in_array($footer['category'][$i]['id'],$blocked)):
            continue;
        endif;
        ?>
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