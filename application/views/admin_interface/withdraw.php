<?php

	$unid = uniqid('opt_');
	$project = '6084';
	$secret = 'sgJF2znnzmpITAG4nCtrImHs';
	$timestamp = time();

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
			$response = "Balance: ".$final->status." $";
		} else {
			$response = "Error: ".$final->status;
		}
		
	} elseif($_GET['action'] == 'pay') {
		if($_POST['payment'] == 'visa') {
			$payment = '1011350';
		}
		if(!isset($_POST['expiry']) or !isset($_POST['amount']) or !isset($_POST['account']) or $_POST['expiry']=="" or $_POST['amount']=="" or $_POST['account'] == "") {
			$response = "Not all parameters are sent!";
		} else {
		$expiry = $_POST['expiry'];
		$amount = $_POST['amount'];
		$account = $_POST['account'];
		$action = 'check';
		$params = $account.$amount.'840'.$expiry.$payment.'9094281234'.$unid;
		$signString = md5($timestamp .$project . $action . $params . $secret);
		$xml = "xml=<request>
		  <project>$project</project>
		  <action>$action</action>
		  <timestamp>$timestamp</timestamp>
		  <sign>$signString</sign>
		  <params>
			<account>".$account."</account>
			<amount>".$amount."</amount>
			<currency>840</currency>
			<expiry>".$expiry."</expiry>
			<paysystem>".$payment."</paysystem>
			<phone>9094281234</phone>
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
			
			$action = 'check';
			$params = $account.$amount.'840'.$expiry.$payment.'9094281234'.$unid;
			$signString = md5($timestamp .$project . $action . $params . $secret);
			$xml = "xml=<request>
			  <project>$project</project>
			  <action>$action</action>
			  <timestamp>$timestamp</timestamp>
			  <sign>$signString</sign>
			  <params>
				<invoice>".$final->invoice."</invoice>
				<amount>".$amount."</amount>
				<currency>840</currency>
				<txn_id>".$unid."</txn_id>
			  </params>
			</request>";
			
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
			
			if($payfinal->status == 1) {
				$responce = "You've sent your ".$amount."$ to ".$account." successfuly!";
			} else {
				$responce = "Error: ".$payfinal->status;
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
				<div style="height:3px;"> </div>
				<?php $this->load->view("admin_interface/forms/withdraw");?>
			</div>
			<?php $this->load->view("admin_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view("admin_interface/includes/scripts");?>
</body>
</html>