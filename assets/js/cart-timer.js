var countdown;
jQuery(document).ready(function($) {
	$("#add-to-cart").mouseover(function(){
		setTimer();
	});
	if ($(".countdown").length > 0) {
		$(".countdown").html('00:00s remaining');
		setTimer();
	}
});

function getCookie(c_name) {
	var c_value = document.cookie;
	var c_start = c_value.indexOf(" " + c_name + "=");
	if (c_start == -1){
	  c_start = c_value.indexOf(c_name + "=");
	  }
	if (c_start == -1)
	  {
	  c_value = null;
	  }
	else
	  {
	  c_start = c_value.indexOf("=", c_start) + 1;
	  var c_end = c_value.indexOf(";", c_start);
	  if (c_end == -1)
	  {
	c_end = c_value.length;
	}
	c_value = unescape(c_value.substring(c_start,c_end));
	}
	return c_value;
} 

function setTimer() {
	if(countdown){ clearInterval(countdown); }
	var cookieTime = getCookie("timercookie");
	if (cookieTime == null) {
        // do cookie doesn't exist stuff;
		console.log("null");
    } else {
        // do cookie exists stuff
		var currentTime =  new Date().getTime();
		currentTime = Math.floor(currentTime/1000);
		//var futureTime = unescape(cookieTime.replace(/\+/g, " "));
		//console.log('cookie: ' + cookieTime +' currenttime:' + currentTime );
		var futureTime = cookieTime;
		//console.log(currentTime + ':'+ futureTime);
		if(currentTime < futureTime){
			countdown = setInterval(function () {
				var currentTime =  new Date().getTime();
				currentTime = Math.floor(currentTime/1000);
				timeLeft = timeDifference(futureTime, currentTime);
				// If time difference hits zero stop the interval, clear the cookie, and clear the cart
				//console.log(currentTime + " : " + futureTime  + " : " + cookieTime);

				if(timeLeft[0] == "00" && timeLeft[1] == "00"){
					clearInterval(countdown);
					clearCookie();
					document.location = "/timeout";
				} else {
					if ($(".countdown").length > 0) {
						$(".countdown").html(timeLeft[0]+':'+timeLeft[1] +  's remaining');
					}
				}
				$('.cart-header span').html(timeLeft[0]+':'+timeLeft[1] +  's remaining');
   			 }, 1000);
			
		} else {
			//console.log("over");
			clearInterval(countdown);
			clearCookie();
			location.reload();
		} 
    }
}

function clearCookie(){
	document.cookie ='timercookie=clear; expires=Thu, 2 Aug 2001 20:47:11 UTC; path=/';
}

function timeDifference(futureTime, currentTime){
	var delta = futureTime - currentTime;
	var days = Math.floor(delta / 86400);
	var hours = Math.floor(delta / 3600) % 24;
	var minutes = Math.floor(delta / 60) % 60;
	if(minutes < 10){
		minutes = "0"+minutes;
	}
	var seconds = delta % 60;
	if(seconds < 10){
		seconds = "0"+seconds;
	}
	var myTime=[minutes,seconds];
	return (myTime);
}