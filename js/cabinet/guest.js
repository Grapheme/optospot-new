/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */

$(function(){
	var mainOptions = {target: null,beforeSubmit: mt.ajaxBeforeSubmit,success: mt.ajaxSuccessSubmit,dataType:'json',type:'post'};
	
	$("#ChangeLang").change(function(){mt.redirect(mt.getBaseURL(mt.getLanguageURL()+'/change-site-language/'+$(this).val()));});
	
	
	
	
	
	
	
	$("button.btn-signup").click(function(){
		var _this = this;
		var options = mainOptions;
		var thisDefaultTextValue = $(this).html();
		$(this).html(Localize[mt.currentLenguage]['wait']);
		options.beforeSubmit = function(formData,jqForm,options){
			if(mt.validation(jqForm) === false){
				$(_this).html(thisDefaultTextValue);
				return false;
			}else{
				return true;
			}
		},
		options.success = function(response,status,xhr,jqForm){
			mt.ajaxSuccessSubmit(response,status,xhr,jqForm);
			if(response.status){
				mt.redirect(response.redirect);
			}else{
				$(_this).html(thisDefaultTextValue);
				alert(response.responseText);
			}
		}
		$("form.form-signup").ajaxSubmit(options);
		return false;
	})
	$("button.btn-signin").click(function(){
		var options = mainOptions;
		options.success = function(response,status,xhr,jqForm){
			mt.ajaxSuccessSubmit(response,status,xhr,jqForm);
			if(response.status){
				showMessageBlock(response.userBlock);
				signUpBlock();
			}else{
				$("#login-email").setValidationErrorStatus(response.responseText);
			}
		}
		$("form.form-signin").ajaxSubmit(options);
		return false;
	})
	$("a.a-forgot-password").click(function(){
		$("div.popover").toggle().defaultValidationErrorStatus();
	});
	$("button.btn-forgot-pass").click(function(){
		var _form = $("form.form-forgot-password");
		var _this = this;
		var options = mainOptions;
		options.success = function(response,status,xhr,jqForm){
			mt.ajaxSuccessSubmit(response,status,xhr,jqForm);
			if(response.status === true){
				$(_form).html(response.responseText);
			}else{
				$("#ForgotEmail").setValidationErrorStatus(response.responseText);
			}
		}
		$(_form).ajaxSubmit(options);
		return false;
	})
	$("button.btn-account-create").click(function(){
		var accountType = $(this).attr('data-account-type');
		var _this = this;
		var thisDefaultTextValue = $(this).html();
		$.ajax({
			url: mt.baseURL+mt.currentLenguage+'/signup-account',
			data: {'type':accountType},type: 'POST',dataType: 'json',
			beforeSend: function(){
				$(_this).html(Localize[mt.currentLenguage]['wait']);
			},
			success: function(response,textStatus,xhr){
				if(response.status){
					if(accountType == 'real'){
						mt.redirect(response.redirect);
					}else if(accountType == 'demo'){
						$(_this).html(thisDefaultTextValue);
						showMessageBlock(response.userBlock);
						$('div.btn-wrapper').html(response.responseText);
					}
				}else{
					$(_this).html(thisDefaultTextValue);
					alert(response.responseText);
				}
			},
			error: function(xhr,textStatus,errorThrown){
				alert(Localize[mt.currentLenguage]['error']);
				$(_this).html(thisDefaultTextValue);
			}
		});
	});
	function showMessageBlock(text){
		$("#login-block").html(text);
		$("button.signup-btn").attr("disabled","disabled").html('Not active');
		$("#TradeLink").replaceWith('<a class="btn btn-action" href="'+mt.currentURL+'trade">Start trade now</a>');
	}
	function signUpBlock(){
		$(".btn-signup").attr('disabled','disabled').html(Localize[mt.currentLenguage]['locked']);
	}
	$("#main-nav li a").each(function(){
		if ($(this).attr('href') == window.location.href) {
			$(this).addClass('active');
		}
	});
});