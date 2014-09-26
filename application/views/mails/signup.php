<p>Уважаемый <?=$account['fname'].' '.$account['lname'];?>,</p>
<p>Благодарим Вас за то, что Вы сделали свой выбор в пользу торговой платформы OptoSpot! Наша платформа является, пожалуй, наиболее передовой среди огромного разнообразия на рынке бинарных опционов.</p>
<p>Пожалуйста сохраните это письмо. Для доступа к вашему личному кабинету используйте следующие данные:</p></p>
<p>---------------------------- <br/>
Логин: <?=$reg_data['login'];?><br/>
Пароль: <?=$reg_data['password'];?>
<br/>----------------------------</p>
<?php if(isset($reg_data['auto_demo']) && !is_null($reg_data['auto_demo'])):?>
<p>Для Вас автоматически был создан Демо счет.</p>
<p>---------------------------- <br/>
Логин: <?=$reg_data['auto_demo']['login'];?><br/>
Пароль: <?=$reg_data['auto_demo']['password'];?>
<br/>----------------------------</p>
<?php endif;?>
<p>Вы находитесь всего в одном шаге от нового этапа в Вашей жизни. Этапа достойного заработка, основанного всего лишь на Ваших анализе и стратегии. Вы также можете ознакомиться с кратким видеообзором (ссылка на видео), который несомненно поможет Вам лучше ориентироваться в настройках и возможностях платформы OptoSpot.</p>
<p>Спасибо за то, что выбрали нашу компанию.</p>

<p>
С уважением, <br/>
Optospot Team<br/>
<br/>
Phone: +44 203 00 25979<br/>
Phone: + 7 800 333 01 27<br/>
Skype: optospot.trading<br/>
Web-site: www.optospot.net
</p>

<p>
	***********************************************
</p>

<p>Dear<em><?=$account['fname'].' '.$account['lname'];?></em>,</p>
<p>Welcome to the site optospot.net. Please save this message. Parameters of your account are as follows:</p>
<p>---------------------------- <br/>
Login: <?=$reg_data['login'];?><br/>
Password: <?=$reg_data['password'];?>
<br/>----------------------------</p>
<?php if(isset($reg_data['auto_demo']) && !is_null($reg_data['auto_demo'])):?>
<p>For you automatically created a Demo account.</p>
<p>---------------------------- <br/>
Demo Login: <?=$reg_data['auto_demo']['login'];?><br/>
Demo Password: <?=$reg_data['auto_demo']['password'];?>
<br/>----------------------------</p>
<?php endif;?>
<p>Thank you for being registered.</p>