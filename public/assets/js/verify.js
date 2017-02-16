if(localStorage.verify == 1){

}
else{
	var username = window.prompt("Enter your username","");
	var password = window.prompt("Enter your password","");

	if(username == 'propisor' && password == 'windows'){
		localStorage.setItem("verify", "1");
	}
	else{
		window.location = "http://www.propisor.com/access-denied";
	}
}
