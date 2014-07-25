
function checkInputs()
{
 
	var dateText = document.getElementById('datepicker'); 
	if(dateText.value === '')
	{
		dateText.style.border = "1px solid red"; 
		dateText.style.backgroundColor = "yellow"; 
		showValError("Enter a date"); 
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
		showValError("Enter a location under 100 characters");   
		return false; 
	}

	var DLoc = document.getElementById('DLoc'); 
	if(DLoc.value.length >=100)
	{
		DLoc.style.border = "1px solid red"; 
		DLoc.style.backgroundColor = "yellow";
		showValError("Drop off location must be less than 100 characters.");   
		return false; 
	}
	


	var num = document.getElementById('num'); 
	if(num.value === '' || num.value.length != 11)
	{
		num.style.border = "1px solid red"; 
		num.style.backgroundColor = "yellow"; 
		showValError("Contact number must be 11 digits"); 
		return false; 
	}


	var add = document.getElementById('add'); 
	if(add.value.length >=500)
	{
		add.style.border = "1px solid red"; 
		add.style.backgroundColor = "yellow";
		showValError("Comments cannot be more than 500 characters");   
		return false; 
	}




	return true; 

	//NEED TO ADD RANGE LIMITS. 




}


function showValError(message)
{
	var error = document.getElementById('request_validation'); 
	error.style.display = "block"; 


	var currentText = error.innerHTML; 
	error.innerHTML = currentText + "<br/><li>" + message + "</li >"; 
	


}