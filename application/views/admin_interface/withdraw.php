<?php

$this->config->load('withdraw');

$unid = uniqid('opt_');
$timestamp = time();
$response = '';

$project = $this->config->item('withdraw_project');
$secret = $this->config->item('withdraw_secret');
$url = $this->config->item('withdraw_url');
$page = $this->config->item('withdraw_page');
$errors = $this->config->item('withdraw_errors');

$action = 'paysystems';
$signString = md5($timestamp.$project.$action.$secret);
$whatsystem_xml = '<?xml version="1.0" encoding="UTF-8"?>'.
"<request>
    <action>$action</action>
    <project>$project</project>
    <timestamp>$timestamp</timestamp>
    <paysystems>
        <paysystem>2</paysystem>
        <paysystem>9</paysystem>
        <paysystem>19</paysystem>
        <paysystem>22</paysystem>
        <paysystem>23</paysystem>
        <paysystem>33</paysystem>
    </paysystems>
    <sign>$signString</sign>
</request>";

$headers = array("POST ".$page." HTTP/1.0","Content-type: text/xml;charset=\"utf-8\"","Accept: text/xml","Content-length: ".strlen($whatsystem_xml));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $whatsystem_xml);
$result = curl_exec($ch);
$final = simplexml_load_string($result);
curl_close($ch);

$payarray = json_decode(json_encode((array)simplexml_load_string($result)), 1);

if ($this->input->get('action') === FALSE):
    $action = 'main_balance';
    $signString = md5($timestamp.$project.$action.$secret);
    $xml = '<?xml version="1.0" encoding="UTF-8"?>'.
    "<request>
        <project>$project</project>
        <action>$action</action>
        <timestamp>$timestamp</timestamp>
        <sign>$signString</sign>
    </request>";

    $headers = array("POST ".$page." HTTP/1.0","Content-type: text/xml;charset=\"utf-8\"","Accept: text/xml","Content-length: ".strlen($xml));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    $result = curl_exec($ch);
    $final = simplexml_load_string($result);
    curl_close($ch);

    if($final->status == 1):
        $response = "Balance: " . $final->balance." RUB";
    else:
        $response = "Error: " . $final->status;
    endif;

elseif ($this->input->get('action') == 'pay'):

    $this->form_validation->set_rules('payment', 'Payment', 'required');
    $this->form_validation->set_rules('account', 'Account', 'required');
    $this->form_validation->set_rules('amount', 'Amount', 'required');

    if ($this->form_validation->run() === FALSE):
        $response = "Not all parameters are sent!";
    else:
        try {
            $payment = $this->input->post('payment');
            $account = $this->input->post('account');
            $name = $this->input->post('name');
            $expiry = $this->input->post('expiry');
            $amount = $this->input->post('amount');
            $phone = $this->config->item('withdraw_phone');
            $currency = $this->config->item('withdraw_currency');
            $action = 'check';
            //////////////
            $expiry_str = $name_str = $phone_str = '';
            if ($payment == '9'):
                $expiry_str = "<expiry>$expiry</expiry>";
                $name_str = "<name>$name</name>";
                $phone_str = "<phone>$phone</phone>";
            endif;
            //////////////
            $params = $account.$amount.$currency.$expiry.$name.$payment.$phone.$unid;
            $signString = md5($timestamp.$project.$action.$params.$secret);
            $xml = '<?xml version="1.0" encoding="UTF-8"?>'.
                "<request>
                    <project>$project</project>
                    <action>$action</action>
                    <timestamp>$timestamp</timestamp>
                    <sign>$signString</sign>
                    <params>
                        <account>$account</account>
                        <amount>$amount</amount>
                        <currency>$currency</currency>
                        ".$expiry_str.$name_str."
                        <paysystem>$payment</paysystem>
                        <phone>$phone</phone>
                        <txn_id>$unid</txn_id>
                    </params>
                </request>";

            $headers = array("POST " . $page . " HTTP/1.0","Content-type: text/xml;charset=\"utf-8\"","Accept: text/xml","Content-length: ".strlen($xml));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            $result = curl_exec($ch);
            $final = simplexml_load_string($result);
            curl_close($ch);

            if ($final->status == 1):
                $action = 'pay';
                $params = $invoice = $final->invoice;
                $signString = md5($timestamp . $project . $action . $params . $secret);
                $xml = '<?xml version="1.0" encoding="UTF-8"?>' .
                    "<request>
                    <action>$action</action>
                    <project>$project</project>
                    <timestamp>$timestamp</timestamp>
                    <params>
                        <invoice>$invoice</invoice>
                    </params>
                    <sign>$signString</sign>
                </request>";

                $headers = array("POST " . $page . " HTTP/1.0", "Content-type: text/xml;charset=\"utf-8\"", "Accept: text/xml", "Content-length: " . strlen($xml));
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
                $result = curl_exec($ch);
                $payfinal = simplexml_load_string($result);
                curl_close($ch);
                if ($payfinal->status == 1 || $payfinal->status == 2):
                    $response = "Your ".$amount." USD are sending!";
                else:
                    $error_index = (int)$payfinal->status;
                    if (isset($errors[$error_index])):
                        $response = "Error: ".@$errors[$error_index];
                    else:
                        $response = "Error: ".@$payfinal->status;
                    endif;
                endif;
            else:
                $response = "Error: ".@$errors[(int)$final->status];
            endif;
        }catch (Exception $e){
            $response = "Exception Errors";
        }
    endif;
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("admin_interface/includes/head"); ?>
</head>
<body>
<?php $this->load->view("admin_interface/includes/header"); ?>
<div class="container">
    <div class="row">
        <div class="span19">
            <div class="navbar">
                <div class="navbar-inner">
                    <a class="brand none" href="">Withdraw</a>
                </div>
            </div>
            <?= $response."<br><br>";?>
            <?php $this->load->view("alert_messages/alert-error"); ?>
            <?php $this->load->view("alert_messages/alert-success"); ?>
            <?php if ($this->input->get('action') === FALSE): ?>
            <form action="?action=pay" method="POST" class="form-horizontal form-edit-settings form-withdraw">
                <fieldset>
                    <label>Choose payment:</label>
                <?php if(isset($payarray['paysystems']['paysystem']) && count($payarray['paysystems']['paysystem'])):?>
                    <select name="payment" autocomplete="off">
                    <?php foreach($payarray['paysystems']['paysystem'] as $payment_system):?>
                        <option value="<?=$payment_system['id'];?>"><?=$payment_system['title'];?></option>
                    <?php endforeach;?>
                    </select>
                <?php endif;?>
                    <div class="withdraw-div">
                        <label>Specify the account number to withdraw money:</label>
                        <input type="text" class="valid-required" name="account" placeholder="1234123412341234" autocomplete="off">
                    </div>
                    <div class="name-div withdraw-div" style="display: none;">
                        <label>Name:</label>
                        <input type="text" name="name" placeholder="Ivan Ivanov" autocomplete="off">
                    </div>
                    <div class="expiry-div withdraw-div" style="display: none;">
                        <label>Expiry date:</label>
                        <input type="text" name="expiry" placeholder="0617" autocomplete="off">
                    </div>
                    <div class="withdraw-div">
                        <label>Amount for withdrawal (USD):</label>
                        <input type="text" class="valid-required" name="amount" placeholder="00.00" autocomplete="off"><br>
                    </div>
                </fieldset>
                <div class="form-actions">
                    <button class="btn btn-success btn-withdrawal" type="submit" value="Send money"><?= $this->localization->getLocalButton('withdraw', 'submit_withdraw') ?></button>
                </div>
            </form>
            <?php else:
                echo "<br><a href='" . site_url('admin-panel/withdraw') . "'>Get back</a>";
            endif; ?>
        </div>
        <?php $this->load->view("admin_interface/includes/rightbar"); ?>
    </div>
</div>
<?php $this->load->view("admin_interface/includes/scripts"); ?>
</body>
</html>