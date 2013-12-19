/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */

$(function(){

	//$('select[name=payment]').find('option[value=2]').hide();
	//$('select[name=payment]').find('option[value=1]').hide();
	//$('select[name=payment]').find('option[value=33]').hide();
	//$('select[name=payment]').find('option[value=9]').html('MasterCard');
	//$('select[name=payment]').find('option[value=1011350]').html('Visa');

	if($('select[name=payment]').val() == '9' || $('select[name=payment]').val() == '1011350')
	{
		$('.expiry-div').show();
	}
	
	if($('select[name=payment]').val() == '9')
	{
		$('.expiry-div').show();
		$('.name-div').show();
	}
	
	$('select[name=payment]').change(function(){
		if($('select[name=payment]').val() == '1011350')
		{
			$('.expiry-div').fadeIn();
			$('.name-div').fadeOut();
		} else if($('select[name=payment]').val() == '9') {
			$('.name-div').fadeIn();
			$('.expiry-div').fadeIn();
		} else {
			$('.expiry-div').fadeOut();
			$('.name-div').fadeOut();
		}
	});
	
	var mainOptions = {target: null,beforeSubmit: mt.ajaxBeforeSubmit,success: mt.ajaxSuccessSubmit,dataType:'json',type:'post'};
	$("button.btn-edit-user").click(function(event){
		var _form = $("form.form-edit-user");
		if(mt.validation(_form) === false){
			event.preventDefault();
		}
	})
	$("button.btn-edit-settings").click(function(event){
		var _form = $("form.form-edit-settings");
		if(mt.validation(_form) === false){
			event.preventDefault();
		}
	})
	$("button.btn-language-insert").click(function(event){
		var _form = $("form.form-language-insert");
		if(mt.validation(_form) === false){
			event.preventDefault();
		}
	})
	$("button.btn-lang-property").click(function(event){
		var _form = $("form.form-lang-property");
		if(mt.validation(_form) === false){
			event.preventDefault();
		}
	})
	$("button.btn-category-insert").click(function(event){
		var _form = $("form.form-category-insert");
		if(mt.validation(_form) === false){
			event.preventDefault();
		}
	})
	$("button.btn-category-update").click(function(event){
		var _form = $("form.form-category-update");
		if(mt.validation(_form) === false){
			event.preventDefault();
		}
	})
	$("button.btn-insert-page").click(function(event){
		var _form = $("form.form-insert-page");
		if(mt.validation(_form) === false){
			event.preventDefault();
		}
	})
	$("button.btn-home-page").click(function(event){
		var _form = $("form.form-home-page");
		if(mt.validation(_form) === false){
			event.preventDefault();
		}
	})

	$("#msgeclose").click(function(){$("#msgdealert").fadeOut(1000,function(){$(this).remove();});});
	$("#msgsclose").click(function(){$("#msgdsalert").fadeOut(1000,function(){$(this).remove();});});
});