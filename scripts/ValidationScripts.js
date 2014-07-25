
function checkInputs()
{
 
	var dateText = document.getElementById('datepicker'); 
	if(dateText.value === '')
	{
		dateText.style.border = "1px solid red"; 
		dateText.style.backgroundColor = "yellow"; 
		showValError(); 
		return false; 
	}
	

	var PLoc = document.getElementById('PLoc'); 
	if(PLoc.value === '')
	{
		PLoc.style.border = "1px solid red"; 
		PLoc.style.backgroundColor = "yellow";
		showValError();   
		return false; 
	}
	


	var num = document.getElementById('num'); 
	if(num.value === '')
	{
		num.style.border = "1px solid red"; 
		num.style.backgroundColor = "yellow"; 
		showValError(); 
		return false; 
	}

	return true; 

	//NEED TO ADD RANGE LIMITS. 




}


function showValError()
{
	var error = document.getElementById('request_validation'); 
	error.style.display = "block"; 
}