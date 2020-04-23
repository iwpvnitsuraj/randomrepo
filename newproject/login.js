	var x = document.getElementById('login');
	var y = document.getElementById('signup');
	var z = document.getElementById('btn');

	function signUp() {
		x.style.left = "-480px"
		y.style.left = "50px"
		z.style.left = "110px"	
	}

	function logIn() {
		x.style.left = "50px"
		y.style.left = "450px"
		z.style.left = "0"	
	}
		
	function validation(){
		var name = document.querySelector('.name').value;
		var mobile = document.querySelector('.mobile').value;
		var pass = document.querySelector('.pass').value;
		var cpass = document.querySelector('.cpass').value;
		var pin = document.querySelector('.pin').value;
		

		if(name.length >= 30 || name.length <= 1){
			document.querySelector('.sp3').innerHTML = "**Name must be between 2-30 characters";
			return false;
		}
		else{
			document.querySelector('.sp3').innerHTML = " ";
		}

		if(name.match(/[a-zA-Z]/g)){
			document.querySelector('.sp3').innerHTML = " ";
		}
		else{
			document.querySelector('.sp3').innerHTML = "**Name mustn't contain numbers";
			return false;
		}	

		if(mobile.length != 10){
			document.querySelector('.sp4').innerHTML = "**Enter a valid number ";
			return false;
		}
		else{
			document.querySelector('.sp4').innerHTML = " ";
		}	
		if(isNaN(mobile)){
			document.querySelector('.sp4').innerHTML = "**Mobile number must contain only numbers";
			return false;
		}
		else{
			document.querySelector('.sp4').innerHTML = " ";
		}

        if(pin.length != 6){
			document.querySelector('.sp8').innerHTML = "**Enter a valid pin code ";
			return false;
		}
		else{
			document.querySelector('.sp8').innerHTML = " ";
		}	
		if(isNaN(pin)){
			document.querySelector('.sp8').innerHTML = "**Pin code must contain only numbers";
			return false;
		}
		else{
			document.querySelector('.sp8').innerHTML = " ";
		}


		if(pass.length < 6 || pass.length >= 16){
			document.querySelector('.sp6').innerHTML = "**Password length must be between 6-15 characters";
			return false;
		}
		else{
			document.querySelector('.sp6').innerHTML = " ";
		}
		
		if (/*pass.match(/[a-zA-Z]/g) && */pass.match( 
                    /[0-9]/g) && pass.match( 
                    /[^a-zA-Z\d]/g)/* && pass.length >= 8*/)
                document.querySelector('.sp6').innerHTML = " ";
        else {
        		document.querySelector('.sp6').innerHTML = "**Password must follow stated pattern";
                return false; 
             }

        if(pass!=cpass)
        {
        	document.querySelector('.sp7').innerHTML = "**Password doesn't match";
            return false;
        }
        else{
			document.querySelector('.sp7').innerHTML = " ";
		}

	}
