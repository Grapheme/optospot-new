/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */

$(function(){
	var mainOptions = {target: null,beforeSubmit: mt.ajaxBeforeSubmit,success: mt.ajaxSuccessSubmit,dataType:'json',type:'post'};
	
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
	})
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
		$("form.form-signup").ajaxSubmit(options);
		return false;
	});
	$("#msgeclose").click(function(){$("#msgdealert").fadeOut(1000,function(){$(this).remove();});});
	$("#msgsclose").click(function(){$("#msgdsalert").fadeOut(1000,function(){$(this).remove();});});
});