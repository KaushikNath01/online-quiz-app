document.addEventListener('DOMContentLoaded', () => {
    function makeTimer() {
		let endTime = new Date("25 October 2021 4:36:00 GMT+01:00");			
			endTime = (Date.parse(endTime) / 1000);

			let now = new Date();
			now = (Date.parse(now) / 1000);
			let timeLeft = endTime - now;
			let days = Math.floor(timeLeft / 86400); 
			let hours = Math.floor((timeLeft - (days * 86400)) / 3600);
			let minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
			let seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
  
			if (seconds < "10") { seconds = "0" + seconds; }

			$("#seconds").html(seconds);		
	}
	        setInterval(function() { makeTimer(); }, 1000);
})

