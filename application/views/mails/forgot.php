<p>Dear <em><?=$first_name.' '.$last_name;?></em>,</p>
<p>You have requested a new password to access the site <?=anchor('','Optospot trading platform');?></p>
<p>Login: <?=$trade_login;?><br/>Password: <?=$this->encrypt->decode($trade_password);?></p>
<p>
	***********************************************
</p>
<p>Уважаемый <em><?=$first_name.' '.$last_name;?></em>,</p>
<p>К нам поступил запрос на смену вашего пароля для доступа к своему личному кабинету на сайте <?=anchor('','Optospot.net');?></p>
<p>Логин: <?=$trade_login;?><br/>Пароль: <?=$this->encrypt->decode($trade_password);?></p>