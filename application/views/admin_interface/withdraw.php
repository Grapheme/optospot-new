<?php

	$unid = uniqid('opt_');
	$project = '6422';
	$secret = 'ypKMQTM7dgHDu4bL';
	$timestamp = time();
	$action = "paysystems";
	$signString = md5($timestamp .$project . $action . $secret);
	
	$whatsystem_xml = '<?xml version="1.0" encoding="UTF-8"?>
<request>
    <action>'.$action.'</action>
    <project>'.$project.'</project>
    <timestamp>'.$timestamp.'</timestamp>
    <sign>'.$signString.'</sign>
</request>';

	$url = "http://gsg.dengionline.com/api";
	$page = "/api";
	$headers = array("POST ".$page." HTTP/1.0",
	                     "Content-type: text/xml;charset=\"utf-8\"",
	                     "Accept: text/xml",
	                     "Content-length: ".strlen($whatsystem_xml));
	 
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
	
	$payarray = json_decode(json_encode((array)simplexml_load_string($result)),1);

	if(!isset($_GET['action'])) {
		
		$action = 'main_balance';
		$signString = md5($timestamp .$project . $action . $secret);
		$xml = "xml=<request>
		  <project>$project</project>
		  <action>$action</action>
		  <timestamp>$timestamp</timestamp>
		  <sign>$signString</sign>
		</request>";
		
		$url = "http://gsg.dengionline.com/api";
		$page = "/api";
		$headers = array("POST ".$page." HTTP/1.0",
		                     "Content-type: text/xml;charset=\"utf-8\"",
		                     "Accept: text/xml",
		                     "Content-length: ".strlen($xml));
		 
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
		
		if($final->status == 1) {
			$response = "Balance: ".$final->balance." RUB";
		} else {
			$response = "Error: ".$final->status;
		}
		
	} elseif($_GET['action'] == 'pay') {
		
		//$payment = '1011350';
		$payment = $_POST['payment'];
		if(!isset($_POST['amount']) or !isset($_POST['account']) or $_POST['amount']=="" or $_POST['account'] == "") {
			$response = "Not all parameters are sent!";
		} else {
		if(isset($_POST['expiry'])) {
			$expiry = $_POST['expiry'];
		} else {
			$expiry = "";
		}
		if(isset($_POST['name'])) {
			$name = $_POST['name'];
		} else {
			$name = "";
		}
		
		$amount = $_POST['amount'];
		$account = $_POST['account'];
		$action = 'check';
		///////////////
		if($payment=='1011350' or $payment=='9') 
		{
			$expiry_str = "<expiry>".$expiry."</expiry>";
		} else {
			$expiry_str = "";
		}
		if($payment=='9') 
		{
			$name_str = "<name>".$name."</name>";
		} else {
			$name_str = "";
		}
		//////////////
		$params = $account.$amount.'840'.$expiry.$name.$payment.'9015115115'.$unid;
		$signString = md5($timestamp . $project . $action . $params . $secret);
		$xml = "xml=<request>
		  <project>$project</project>
		  <action>$action</action>
		  <timestamp>$timestamp</timestamp>
		  <sign>$signString</sign>
		  <params>
			<account>".$account."</account>
			<amount>".$amount."</amount>
			<currency>840</currency>
			".$expiry_str.$name_str."
			<paysystem>".$payment."</paysystem>
			<phone>9015115115</phone>
			<txn_id>".$unid."</txn_id>
		  </params>
		</request>";
		
		$url = "http://gsg.dengionline.com/api";
		$page = "/api";
		$headers = array("POST ".$page." HTTP/1.0",
		                     "Content-type: text/xml;charset=\"utf-8\"",
		                     "Accept: text/xml",
		                     "Content-length: ".strlen($xml));
		 
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
				
		if($final->status == 1) {
			
				$action = 'pay';
				$params = $final->invoice;
				$signString = md5( $timestamp .$project . $action . $params . $secret);
				$xml = "xml=<request>
				  <project>$project</project>
				  <action>$action</action>
				  <timestamp>$timestamp</timestamp>
				  <sign>$signString</sign>
				  <params>
					<invoice>".$final->invoice."</invoice>
				  </params>
				</request>";
	
				
				$url = "http://gsg.dengionline.com/api";
				$page = "/api";
				$headers = array("POST ".$page." HTTP/1.0",
				                     "Content-type: text/xml;charset=\"utf-8\"",
				                     "Accept: text/xml",
				                     "Content-length: ".strlen($xml));
				
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
				
				if($payfinal->status == 1 or $payfinal->status == 2) {
					$response = "Your ".$amount." USD are sending!";
				} else {
					$response = "Error: ".$payfinal->status;
				}
		
			} elseif($final->status == 16){
				$response = "Not enough money!";
			} else {
				$response = "Error: ".$final->status;
			}
		}
	}

		
		/*
		$params = '40389682718384154840081510113509094281234'.$unid;
		
		$signString = md5($timestamp .$project . $action . $params . $secret);


		$xml = "xml=<request>
		  <project>$project</project>
		  <action>$action</action>
		  <timestamp>$timestamp</timestamp>
		  <sign>$signString</sign>
		  <params>
			<account>4038968271838415</account>
			<amount>4</amount>
			<currency>840</currency>
			<expiry>0815</expiry>
			<paysystem>1011350</paysystem>
			<phone>9094281234</phone>
			<txn_id>".$unid."</txn_id>
		  </params>
		</request>";
		 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view("admin_interface/includes/head");?>
</head>
<body>
	<?php $this->load->view("admin_interface/includes/header");?>
	<div class="container">
		<div class="row">
			<div class="span19">
				<div class="navbar">
					<div class="navbar-inner">
						<a class="brand none" href="">Withdraw</a>
					</div>
				</div>
				<?php
				echo $response."<br><br>";
				?>
				<?php $this->load->view("alert_messages/alert-error");?>
				<?php $this->load->view("alert_messages/alert-success");?>
				<?php if(!isset($_GET['action'])): ?>
					<form action="?action=pay" method="POST" class="form-horizontal form-edit-settings form-withdraw">
						<?php if($this->account['id'] > 0):?>
							<input type="hidden" name="account_id" value="<?=$this->account['id'];?>" />
							<input type="hidden" name="trade_login" value="<?=$this->profile['trade_login'];?>" />
							<input type="hidden" name="email" value="<?=$this->profile['email'];?>" />
						<?php endif; ?>
							<fieldset>
								<label>Choose payment:</label>
								<select name="payment">
									<option value="9">MasterCard</option>
									<!--<option value="19">WebMoney WMR</option>
									<option value="22">WebMoney WME</option>
									<option value="23">WebMoney WMZ</option>-->
									<option value="2">QIWI-кошелек</option>
									<!--<option value="1011350">Visa</option>-->
									<!--<option value="1013538">Яндекс.Деньги</option>-->
								</select>
								<div class="withdraw-div">
									<label>Specify the account number to withdraw money:</label>
									<input type="text" class="valid-required" name="account" placeholder="1234123412341234">
								</div>
								<div class="name-div withdraw-div" style="display: none;">
									<label>Name:</label>
									<input type="text" name="name" placeholder="Ivan Ivanov">
								</div>
								<div class="expiry-div withdraw-div" style="display: none;">
									<label>Expiry date:</label>
									<input type="text" name="expiry" placeholder="0617">
								</div>
								<div class="withdraw-div">
									<label>Amount for withdrawal (USD):</label>
									<input type="text" class="valid-required" name="amount" placeholder="00.00"><br>
								</div>
							</fieldset>
								
							<div class="form-actions">
								<button class="btn btn-success btn-withdrawal" type="submit" value="Send money"><?=$this->localization->getLocalButton('withdraw','submit_withdraw')?></button>
							</div>
					</form>
				<?php else:
					echo "<br><a href='".site_url('admin-panel/withdraw')."'>Get back</a>";
				endif; ?>
			</div>
			<?php $this->load->view("admin_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view("admin_interface/includes/scripts");?>
</body>
</html>