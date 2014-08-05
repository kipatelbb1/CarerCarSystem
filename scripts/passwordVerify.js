

function check()
{
	var pass1 = document.getElementById('password1'); 
	var pass2 = document.getElementById('password2'); 
	var res = checkSame(pass1, pass2); 
	return res; 
}



function checkSame(pass1, pass2)
{
	if(pass1.value === pass2.value)
	{
		return true; 
	}
	else
	{
		pass1.style.backgroundColor = "Yellow"; 
		pass1.style.border = "1px solid red"; 

		pass2.style.backgroundColor = "Yellow"; 
		pass2.style.border = "1px solid red"; 

		var error = document.getElementById('errReg'); 
		error.innerHTML = "Your passwords do not match"; 
		error.style.display = "block"; 

		return false; 
	}

}