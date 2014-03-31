<?php $payment = array('9'=>'MasterCard','19'=>'WebMoney WMR','22'=>'WebMoney WME','23'=>'WebMoney WMZ','28'=>'QIWI-кошелек','1011350'=>'Visa','1013538'=>'Яндекс.Деньги');?>
<h2>Withdrawal request!</h2>
ID account: <?=$post['account_id']?><br/>
Trade login: <?=$post['trade_login']?><br/>
Account Email: <?=$post['email']?><br/>
Payment system: <?=(isset($payment[$post['payment']])?$payment[$post['payment']]:'Не указано');?><br/>
Account number to withdraw money: <?=$post['account']?><br/>
Name: <?=$post['name']?><br/>
Expiry date: <?=$post['expiry']?><br/>
Specify the amount of money, RUB: = <?=$post['amount']?><br/>