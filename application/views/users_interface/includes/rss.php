<div class="rbk-line">
	<img src="<?=baseURL('img/rbk.png" class="rbk-img');?>">
	<div class="rbk-move normal-text">
	<?php
		$this->load->helper('rss');
		switch ($this->language):
			case '1': getRSS("http://feeds.feedburner.com/yahoo-news-updates", 2);break;
			case '3': getRSS("http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbcdaily.ru/finance_news.rss", 2);break;
			default: getRSS("http://feeds.feedburner.com/yahoo-news-updates", 2);break;
		endswitch;
	?>
	</div>
</div>