function backgroundTime(){
	var d = new Date();
	var time = d.getHours();
	
	if(time >= 17 || time <= 6){
		console.log ("It's Night Time");
		document.getElementById('background').src = "night.jpg";
	}
	else {
		console.log("It's Day Time");
		document.getElementById('background').src = "back.jpg";
	}
}

function changeAvatar() {

}
