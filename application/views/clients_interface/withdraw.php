<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view("clients_interface/includes/head");?>
</head>
<body>
	<?php $this->load->view("clients_interface/includes/header");?>
	<div class="container">
		<div class="row">
			<div class="span19">
				<div class="navbar">
					<div class="navbar-inner">
						<a class="brand no-clickable" href=""><?=$this->localization->getLocalButton('client_cabinet','withdrawal')?></a>
					</div>
				</div>
				<?php $this->load->view("alert_messages/alert-error");?>
				<?php $this->load->view("alert_messages/alert-success");?>
				<div>
					<?=$this->localization->getLocalMessage('withdraw','annotation')?>
				</div>
				<div class="clear"> </div>
				<div>
					<div class="signup-form" id="real-signup">
						<?php $this->load->view('admin_interface/forms/form-withdraw',array('action'=>site_url('cabinet/withdraw/request')));?>
					</div>
				</div>
			</div>
		<?php $this->load->view("clients_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view("clients_interface/includes/scripts");?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("click focus",".card-account",function() {
                $(".card-account").inputmask("mask", {
                    "mask": "9999-9999-9999-9999",
                    "placeholder": "X"
                });
            });
            $(document).on("click focus",".qiwi-account",function() {
                $(".qiwi-account").inputmask("mask", {
                    "mask": "[+7] (999) 999 99 99",
                    "placeholder": "X"
                });
            });
            $(document).on("click focus",".card-expiry-date",function() {
                $(".card-expiry-date").inputmask("mask", {
                    "mask": "99/99",
                    "placeholder": "X"
                });
            });
        });
    </script>
</body>
</html>