window.onload = function(){
	validateLogIn();
}

function validateLogIn(){
	document.getElementById('logInButton').onclick = function(){
		var username = document.getElementById('username').value;
		var password = document.getElementById('password').value;
		if (username == "" || password == ""){
			alert("you need to fill in both fields");
		}
	}
}
