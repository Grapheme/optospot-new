$(function(){
	
	var $ticker = 0;
	$('.ticker-item').each(function(){
		$ticker++;
		$(this).attr('data-id', $ticker);
	});
	
	function toTime(timeF) {
	    var sec_num = parseInt(timeF, 10);
	    var hours   = Math.floor(sec_num / 3600);
	    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
	    var seconds = sec_num - (hours * 3600) - (minutes * 60);
	
	    if (hours   < 10) {hours   = "0"+hours;}
	    if (minutes < 10) {minutes = "0"+minutes;}
	    if (seconds < 10) {seconds = "0"+seconds;}
	    var time    = hours+':'+minutes+':'+seconds;
	    return time;
	}

	function tickerPost() {
		var $currentId = 0;
		var $idJson = "";
		$('.ticker-item').each(function(){
			$currentId++;
			var $ccf = $(this).data('ccf');
			var $ccs = $(this).data('ccs');
			$idJson += '"' + $currentId + '":{"cc1":"' + $ccf + '","cc2":"' + $ccs + '"}';
			if($currentId != $ticker) {
				$idJson += ',';
			}
		});
		
		var $dataoff = "{"+ $idJson +"}";
		
		$.post("ticker-curl", { postdata: $dataoff} , function(data) {
			var $thisTicker;
			var $responce = jQuery.parseJSON(data);
			$.each($responce, function(){
				var $thisTicker = $('.ticker-item[data-id=' + this.id + ']');
				$thisTicker.find('#bid').html(this.bid);
				$thisTicker.find('#payout').html(this.payout+"%");
				$thisTicker.find('#winmax').html("$"+this.winmax);
				$thisTicker.find('#winmin').html("$"+this.winmin);
				if($thisTicker.find('#exp').hasClass('closed')) 
				{
					return false;
				} else {
					var date = new Date(this.exp*1000);
					// hours part from the timestamp
					var hours = date.getHours();
					// minutes part from the timestamp
					var minutes = date.getMinutes();
					// seconds part from the timestamp
					var seconds = date.getSeconds();
					
					// will display time in 10:30:23 format
					var formattedTime = hours + ':' + minutes + ':' + seconds;
					
					$thisTicker.find('#exp').addClass('closed');
					$thisTicker.find('#exp').html(toTime(formattedTime));
				}
			});
		});
		
	}
	tickerPost();
	setInterval(function(){
		tickerPost();
	}, 1000);
});