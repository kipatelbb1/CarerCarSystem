
function checkInputs()
{
	//Clear all previous Errors. 
	var error = document.getElementById('request_validation'); 
	error.innerHTML = ""; 
 
	var dateText = document.getElementById('datepicker'); 
	if(dateText.value === '')
	{
		dateText.style.border = "1px solid red"; 
		dateText.style.backgroundColor = "yellow"; 
		showValError('request_validation',"Enter a date"); 
		return false; 
	}
	else
	{
		dateText.style.border = "1px solid grey"; 
		dateText.style.backgroundColor = "white"; 
	}
	

	var PLoc = document.getElementById('PLoc'); 
	if(PLoc.value === '' || PLoc.value.length >=100)
	{
		PLoc.style.border = "1px solid red"; 
		PLoc.style.backgroundColor = "yellow";
		showValError('request_validation',"Enter a location under 100 characters");   
		return false; 
	}

	var DLoc = document.getElementById('DLoc'); 
	if(DLoc.value.length >=100)
	{
		DLoc.style.border = "1px solid red"; 
		DLoc.style.backgroundColor = "yellow";
		showValError('request_validation',"Drop off location must be less than 100 characters.");   
		return false; 
	}
	


	var num = document.getElementById('num'); 
	if(num.value === '' || num.value.length != 11)
	{
		num.style.border = "1px solid red"; 
		num.style.backgroundColor = "yellow"; 
		showValError('request_validation',"Contact number must be 11 digits"); 
		return false; 
	}


	var add = document.getElementById('add'); 
	if(add.value.length >=500)
	{
		add.style.border = "1px solid red"; 
		add.style.backgroundColor = "yellow";
		showValError('request_validation',"Comments cannot be more than 500 characters");   
		return false; 
	}




	return true; 

	//NEED TO ADD RANGE LIMITS. 




}


function showValError(id, message)
{
	var error = document.getElementById(id); 
	error.style.display = "block"; 


	var currentText = error.innerHTML; 
	error.innerHTML = currentText + "<br/><li>" + message + "</li >"; 
	


}


//SETTINGS VALIDATION 

function checkSettings()
{

	var error = document.getElementById('settings-error'); 
	error.innerHTML = ""; 

	var num = document.getElementById('num'); 
	if(num.value.length !=11)
	{
		num.style.border = "1px solid red"; 
		num.style.backgroundColor = "yellow";
		//showValError("Comments cannot be more than 500 characters");   
		showValErrorSettings("Number must be 11 digits"); 
		return false; 
	}



	var PLoc = document.getElementById('PLoc'); 
	if(PLoc.value.length >=500)
	{
		PLoc.style.border = "1px solid red"; 
		PLoc.style.backgroundColor = "yellow";
		//showValError("Comments cannot be more than 500 characters");   
		showValErrorSettings("Pick Up Location must be under 500 characters"); 
		return false; 
	}

	var DLoc = document.getElementById('DLoc'); 
	if(DLoc.value.length >=500)
	{
		DLoc.style.border = "1px solid red"; 
		DLoc.style.backgroundColor = "yellow";
		showValErrorSettings("Drop Off Location must be under 500 characters");   
		return false; 
	}

	return true; 

}



function showValErrorSettings(message)
{
	var error = document.getElementById('settings-error'); 
	error.style.display = "block"; 


	var currentText = error.innerHTML; 
	error.innerHTML = currentText + "<br/><li>" + message + "</li >"; 
	


}