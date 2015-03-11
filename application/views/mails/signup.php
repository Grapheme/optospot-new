<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<?php if(@$reg_data['accountID']['language'] == 3):?>
    <p>Уважаемый Трейдер,</p>
    <p>Вы успешно завершили процесс регистрации и теперь можете приступить к торговле, воспользовавшись следующей информацией:</p>
    <p>
        Логин: <?=@$reg_data['login'];?><br/>
        Пароль: <?=@$reg_data['password'];?>
    </p>
    <p>Спасибо, что выбрали OptoSpot. Помните, что по любым обратиться в нашу службу поддержки.</p>
    <br>
    <br>
    <p>С уважением,</p>
    <p>Команда Optospot</p>
    <br>
    <p><a href="mailto:support@optospot.net">support@optospot.net</a><br>http://optospot.net/</p>
<?php else:?>
    <p>Dear Trader,</p>
    <p>You have successfully finished information below:</p>
    <p>
        Login: <?=@$reg_data['login'];?><br/>
        Password: <?=@$reg_data['password'];?>
    </p>
    <p>Thank you for joining OptoSpot. Do not hesitate to contact our support team on any matter.</p>
    <br>
    <br>
    <p>Best Regards,</p>
    <p>Optospot Team</p>
    <p><a href="mailto:support@optospot.net">support@optospot.net</a><br>http://optospot.net/</p>
<?php endif; ?>
</body>
</html>