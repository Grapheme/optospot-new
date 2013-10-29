$(function() {
	var marquee = $(".rbk-move"); 
	marquee.css({"overflow": "hidden", "width": "100%"});

	marquee.wrapInner("<span>");
	marquee.find("span").css({ "width": "50%", "display": "inline-block", "text-align":"center" }); 
	marquee.append(marquee.find("span").clone());

	marquee.wrapInner("<div>");
	marquee.find("div").css("width", "200%");

	var reset = function() {
		$(this).css("margin-left", "0%");
		$(this).animate({ "margin-left": "-100%" }, 12000, 'linear', reset);
	};

	reset.call(marquee.find("div"));
	
	$('#screen-2').css('display', 'none');
	$('#screen-3').css('display', 'none');
	
	$("select.selectify").selectify({maxItems:3});
});

function login() {
	$('.login-popup').fadeIn();
	$('.dark-screen').fadeIn();
}

function loginClose() {
	$('.login-popup').fadeOut();
	$('.dark-screen').fadeOut();
}

function cssError(item) {
	$(item).css({'background' : '#ffeeee'});
}

function cssErrorRm(item) {
	$(item).css({'background' : '#ffffff'});
}

function validationTop(_form) {
	var error = 0;
	if($(_form).find('.input-fname').val().length < 3) {
		cssError($(_form).find('.input-fname'));
		error++;
	}else{
		cssErrorRm($(_form).find('.input-fname'));
	}
	if($(_form).find('.input-lname').val().length < 3) {
		cssError($(_form).find('.input-lname'));
		error++;
	} else {
		cssErrorRm($(_form).find('.input-lname'));
	}
	if($(_form).find('.input-email').val() != '') {
		var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
		if(pattern.test($(_form).find('.input-email').val())){
			cssErrorRm($(_form).find('.input-email'));
		}else{
			error++;
			cssError($(_form).find('.input-email'));
		}
	} else {
		error++;
		cssError($(_form).find('.input-email'));
	}
	if($(_form).find('.input-country').val() == '0') {
		cssError($(_form).find('.country-div .selectify .header'));
		error++;
	} else {
		cssErrorRm($(_form).find('.country-div .selectify .header'));
	}
	if($(_form).find('.input-account').val() == '0'){
		cssError($(_form).find('.account-div .selectify .header'));
		error++;
	} else {
		cssErrorRm($(_form).find('.account-div .selectify .header'));
	}
	if(error == 0){
		return true;
	}else{
		return false;
	}
}

function validationReg() {
	var error = 0;
	if($('#reg-form #name').val().length < 3) {
		cssError('#reg-form #name');
		error++;
	} else {
		cssErrorRm('#reg-form #name');
	}
	if($('#reg-form #lastname').val().length < 3) {
		cssError('#reg-form #lastname');
		error++;
	} else {
		cssErrorRm('#reg-form #lastname');
	}
	if($('#reg-form #email').val() != '') {
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        if(pattern.test($('#reg-form #email').val())){
            cssErrorRm('#reg-form #email');
        } else {
        	error++;
            cssError('#reg-form #email');
        }
    } else {
    	error++;
        cssError('#reg-form #email');
    }
    if($('#reg-form #country').val() == '0') {
		cssError('#reg-form #country-div .selectify .header');
		error++;
	} else {
		cssErrorRm('#reg-form #country-div .selectify .header');
	}
	if($('#reg-form #account').val() == '0') {
		cssError('#reg-form #account-div .selectify .header');
		error++;
	} else {
		cssErrorRm('#reg-form #account-div .selectify .header');
	}
	if(error == 0) {
	alert('it works!');
	}
}

function validationOne(next) {
	var error = 0;
	if($('#name').val().length < 3) {
		cssError('#name');
		error++;
	} else {
		cssErrorRm('#name');
	}
	if($('#lastname').val().length < 3) {
		cssError('#lastname');
		error++;
	} else {
		cssErrorRm('#lastname');
	}
	if($('#email').val() != '') {
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        if(pattern.test($('#email').val())){
            cssErrorRm('#email');
        } else {
        	error++;
            cssError('#email');
        }
    } else {
    	error++;
        cssError('#email');
    }
    if($('#country').val() == '0') {
		cssError('#country-div .selectify .header');
		error++;
	} else {
		cssErrorRm('#country-div .selectify .header');
	}
	if(error == 0) {
		if(next == true){
			$('#reg-1').addClass('reg-hidden');
			$('#reg-2').removeClass('reg-hidden');
			$('#reg-1 .reg-block-hidden').removeClass('hidden');
			$('#reg-2 .reg-block-hidden').addClass('hidden');
			$('.acc-radio').prop('checked', false);	
		}
		return true;
	}else{
		return false;
	}
}

function validationTwo(next) {
	if($('.acc-radio').is(':checked')) {
		if(next == true){
			$('#reg-2').addClass('reg-hidden');
			$('#reg-3').removeClass('reg-hidden');
			$('#reg-2 .reg-block-hidden').removeClass('hidden');
			$('#reg-3 .reg-block-hidden').addClass('hidden');
		}
		return true;
	}else{
		return false;
	}
}

function scoreClick(color) {
	if(color == 'green') {
		$('.score.green').css('background','#467850');
		$('.score.blue').css('background','#3179CB');
		$('.acc-radio[value=2]').prop('checked', true);
	}
	if(color == 'blue') {
		$('.score.green').css('background','#5E9C6B');
		$('.score.blue').css('background','#1858a0');
		$('.acc-radio[value=1]').prop('checked', true);
	}
}

function validationAuth() {
	var error = 0;
	if($('#auth-name').val().length < 3) {
		cssError('#auth-name');
		error++;
	}else{
		cssErrorRm('#auth-name');
	}
	if($('#auth-pass').val().length < 3) {
		cssError('#auth-pass');
		error++;
	}else{
		cssErrorRm('#auth-pass');
	}
	if(error == 0){
		return true;
	}else{
		return false;
	}
}

$('.control-line#control-2').click(function(event){
	$('#screen-1').hide();
	$('#screen-3').hide(function(){
		$('#screen-2').fadeIn();
	});
	$('#control-3').removeClass('active');
	$('#control-1').removeClass('active');
	$('#control-2').addClass('active');
});

$('.control-line#control-1').click(function(event){
	$('#screen-2').hide();
	$('#screen-3').hide(function(){
		$('#screen-1').fadeIn();
	});
	$('#control-3').removeClass('active');
	$('#control-2').removeClass('active');
	$('#control-1').addClass('active');
});

$('.control-line#control-3').click(function(event){
	$('#screen-1').hide();
	$('#screen-2').hide(function(){
		$('#screen-3').fadeIn();
	});
	$('#control-1').removeClass('active');
	$('#control-2').removeClass('active');
	$('#control-3').addClass('active');
});

$('button.signup-submit').click(function(event){
	event.preventDefault();
	var _form = $(this).parents('form');
	if(validationTop(_form) == true){
		$(_form).formSubmitInServer();
	}
});

$('button.steps-signup-submit').click(function(event){
	event.preventDefault();
	if(validationOne(false) && validationTwo(false)){
		var _form = $(this).parents('form');
		$(_form).formSubmitNoValid();
	}
});

$('#reg-enter').click(function(event){
	event.preventDefault();
	validationReg();
});

$('#auth-enter').click(function(event){
	event.preventDefault();
	if(validationAuth() == true){
		var _form = $(this).parents('form');
		$(_form).formSubmitInServer();
	}
});

$('#button-2').click(function(event){
	event.preventDefault();
	validationTwo(true);
});

$('.score.green').click(function(event){
	event.preventDefault();
	scoreClick('green');
});

$('.score.blue').click(function(event){
	event.preventDefault();
	scoreClick('blue');
});

$('#button-1').click(function(event) {
	event.preventDefault();
	validationOne(true);
});

$('#enter').click(function(event){
	event.preventDefault();
	login();
});

$('.dark-screen').click(function(){
	loginClose();
});