<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php $this->load->view("users_interface/includes/head");?>
</head>
<body>
<?php $this->load->view("users_interface/includes/ie7");?>
	<?php $this->load->view("users_interface/includes/header");?>
	<div class="main-container">
		<div class="container_12 reg-blocks">
			<div class="grid_12"><h1 class="reg-title">- Регистрация -</h1></div>
			<div class="grid_4 reg-block" id="reg-1">
				<div class="reg-block-hidden hidden"></div>
				<div class="reg-block-in">
					<div class="reg-blocks-title">
						<img src="<?=baseURL('img/red-1.png');?>">
						<h2>Заполните</h2>
					</div>
					<div class="clear"></div>
					<div class="input-container"><input class="begin-input" type="text" placeholder="Имя" id="name"></div>
					<div class="input-container"><input class="begin-input" type="text" placeholder="Фамилия" id="lastname"></div>
					<div class="input-container"><input class="begin-input" type="text" placeholder="E-mail" id="email"></div>
					<div class="input-container" id="country-div">
						<select class="begin-input" id="country">
							<option value="0">Страна</option>
							<option>Россия</option>
						</select>
					</div>
					<button class="red-button reg-block-button" id="button-1">Далее</button>
				</div>
			</div>
			<div class="grid_4 reg-block reg-hidden" id="reg-2">
				<div class="reg-block-hidden"></div>
				<div class="reg-block-in">
					<div class="reg-blocks-title">
						<img src="<?=baseURL('img/red-2.png');?>">
						<h2>Выберите тип счета</h2>
					</div>
					<div class="clear"></div>
					<a href="#" class="score blue">
						<div class="score-in">
							<h2 class="">Демо счет</h2>
							<div class="circle-line"></div>
							<p class="normal-text">Начни торговать без рисков</p>
						</div>
					</a>
					<a href="#" class="score green">
						<div class="score-in">
							<h2>Профи счет</h2>
							<div class="circle-line"></div>
							<p class="normal-text">Минимальный депозит всего за 5 $</p>
						</div>
					</a>
					<button class="red-button reg-block-button" id="button-2">Далее</button>
					<div class="hidden">
						<form>
							<input type="radio" name="account" value="1" class="acc-radio">
							<input type="radio" name="account" value="2" class="acc-radio">
						</form>
					</div>
				</div>
			</div>
			<div class="grid_4 reg-block reg-hidden" id="reg-3">
				<div class="reg-block-hidden"></div>
				<div class="reg-block-in">
					<div class="reg-blocks-title">
						<img src="<?=baseURL('img/red-3.png');?>">
						<h2>Зарегистрируйтесь</h2>
					</div>
					<div class="clear"></div>
					<p class="reg-desc normal-text">На ваш демо счет начисленно 1000$. Вы можете начать торговать прямо сейчас или открыть профи-счет, чтобы ваш заработок стал реальным.</p>
					<button class="red-button reg-block-button">Начать торговать</button>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<?php $this->load->view("users_interface/modal/signin");?>
	<div class="dark-screen"></div>
	<?php $this->load->view("users_interface/includes/footer");?>
	<?php $this->load->view("users_interface/includes/scripts");?>
	<?php $this->load->view("users_interface/includes/analytics");?>
</body>
</html>