/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */

$(function(){
	var mainOptions = {target: null,beforeSubmit: mt.ajaxBeforeSubmit,success: mt.ajaxSuccessSubmit,dataType:'json',type:'post'};
    $("#ChangeLang").change(function(){mt.redirect(mt.getBaseURL(mt.getLanguageURL()+'/change-site-language/'+$(this).val()));});
    if($('select[name=payment]').val() == '9' || $('select[name=payment]').val() == '1011350'){
		$('.expiry-div').show();
	}
	if($('select[name=payment]').val() == '9'){
		$('.expiry-div').show();
		$('.name-div').show();
	}
	$('select[name=payment]').change(function(){
		if($('select[name=payment]').val() == '1011350'){
			$('.expiry-div').fadeIn();
			$('.name-div').fadeOut();
		} else if($('select[name=payment]').val() == 9) {
            $("input[name='account']").removeClass('qiwi-account').addClass('card-account').val('').focus();
            $("input[name='account']").attr('placeholder',$("input[name='account']").attr('data-card'));
			$('.name-div').fadeIn();
			$('.expiry-div').fadeIn();
		} else if($('select[name=payment]').val() == 28) {
            $("input[name='account']").removeClass('card-account').addClass('qiwi-account').val('').focus();
            $("input[name='account']").attr('placeholder',$("input[name='account']").attr('data-qiwi'));
			$('.expiry-div').fadeOut();
			$('.name-div').fadeOut();
		} else {
            $('.expiry-div').fadeOut();
            $('.name-div').fadeOut();
        }
	});
	$("button.btn-account-create").click(function(){
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
	});
	$("button.btn-edit-user").click(function(event){
		var _form = $("form.form-edit-user");
		if(mt.validation(_form) === false){
			event.preventDefault();
		}
	});
	$("button.btn-withdrawal").click(function(){
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
				$(jqForm).resetForm();
				$(_this).html(thisDefaultTextValue);
				alert(response.responseText);
			}else{
				$(_this).html(thisDefaultTextValue);
				alert(response.responseText);
			}
		}
		$("form.form-withdraw").ajaxSubmit(options);
		return false;
	});
	$("#msgeclose").click(function(){$("#msgdealert").fadeOut(1000,function(){$(this).remove();});});
	$("#msgsclose").click(function(){$("#msgdsalert").fadeOut(1000,function(){$(this).remove();});});
	$("#set_deposit_value").click(function(){
		var summa = parseFloat($("#deposit_value").val().trim());
		if(summa > 0){
			$("#deposit_value").val(summa).css({'background' : '#fff'});
			$("#div_deposit_value").fadeOut('fast',function(){
				$("form input[name='amount']").val(summa);
				$("#deposit_system").fadeIn('fast');
			});
		}else{
			$("#deposit_value").val(50).css({'background' : '#ffeeee'}).focus();
		}
	});
	$("#submit_deposit_form_cancel").click(function(){
		$("#deposit_system").fadeOut('fast',function(){
			$("#div_deposit_value").fadeIn('fast');
		});
	});
	$(".submit_deposit_form").click(function(){
		var _form = document.getElementById($(this).attr('data-form-id'));
		if($(_form).find('input[name="amount"]').val().trim() > 0){
			$(_form).submit();
		}
	});
});