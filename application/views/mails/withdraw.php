<?php
    $payment = array(
        '1011350'=>'Visa',
        '9'=>'MasterCard',
        '28'=>'QIWI-кошелек',
        '33'=>'Яндекс.Деньги',
        '19'=>'WebMoney',

        '101'=> 'Okpay',
        '102'=> 'bitcoin',
        '103'=> 'litecoin',
        '104'=> 'dogecoin',
        '105'=> 'W1',
        '106'=> 'EgoPay',
        '107'=> 'Payza',
        '108'=> 'OOOPay',
        '109'=> 'RBK Money');
?>
<h2>Withdrawal request!</h2>
ID account: <?=$post['account_id']?><br/>
Trade login: <?=$post['trade_login']?><br/>
Account Email: <?=$post['email']?><br/>
Payment system: <?=(isset($payment[$post['payment']])?$payment[$post['payment']]:'Не указано');?><br/>
Account number to withdraw money: <?=$post['account']?><br/>
Name: <?=$post['name']?><br/>
Expiry date: <?=$post['expiry']?><br/>
Specify the amount of money, RUB: = <?=$post['amount']?><br/>